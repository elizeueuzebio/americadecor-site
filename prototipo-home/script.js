const navToggle = document.querySelector(".nav-toggle");
const siteNav = document.querySelector(".site-nav");

const sanitizeSingleLine = (value, maxLength = 200) =>
  value
    .replace(/[\u0000-\u001F\u007F]+/g, " ")
    .replace(/\s+/g, " ")
    .trim()
    .slice(0, maxLength);

const sanitizePhoneValue = (value, maxLength = 20) =>
  value
    .replace(/[^0-9()+\-\s]/g, "")
    .replace(/\s+/g, " ")
    .trim()
    .slice(0, maxLength);

const sanitizeMultiline = (value, maxLength = 1000) =>
  value
    .replace(/\r\n/g, "\n")
    .replace(/[\u0000-\u0008\u000B\u000C\u000E-\u001F\u007F]+/g, "")
    .split("\n")
    .map((line) => line.replace(/\s+/g, " ").trim())
    .filter(Boolean)
    .join("\n")
    .slice(0, maxLength);

const sanitizeFieldValue = (field) => {
  const maxLength = Number.parseInt(field.getAttribute("maxlength") || "", 10) || 250;

  if (field.tagName === "TEXTAREA") {
    return sanitizeMultiline(field.value, maxLength);
  }

  if (field.type === "tel") {
    return sanitizePhoneValue(field.value, maxLength);
  }

  return sanitizeSingleLine(field.value, maxLength);
};

const setFieldValidity = (field, isInvalid) => {
  field.setAttribute("aria-invalid", String(isInvalid));
};

const openWhatsAppDestination = (url, target = "_self") => {
  if (!url) {
    return;
  }

  const normalizedTarget = target === "_blank" ? "_blank" : "_self";

  if (typeof window.gtag_report_conversion === "function") {
    window.gtag_report_conversion(url, normalizedTarget);
    return;
  }

  if (normalizedTarget === "_blank") {
    const popup = window.open(url, "_blank", "noopener,noreferrer");

    if (!popup) {
      window.location.href = url;
    }

    return;
  }

  window.location.href = url;
};

if (navToggle && siteNav) {
  navToggle.addEventListener("click", () => {
    const isOpen = siteNav.classList.toggle("is-open");
    navToggle.setAttribute("aria-expanded", String(isOpen));
  });

  siteNav.querySelectorAll("a").forEach((link) => {
    link.addEventListener("click", () => {
      siteNav.classList.remove("is-open");
      navToggle.setAttribute("aria-expanded", "false");
    });
  });
}

const revealItems = document.querySelectorAll(".reveal");

if ("IntersectionObserver" in window && revealItems.length > 0) {
  const revealObserver = new IntersectionObserver(
    (entries, observer) => {
      entries.forEach((entry) => {
        if (!entry.isIntersecting) {
          return;
        }

        entry.target.classList.add("is-visible");
        observer.unobserve(entry.target);
      });
    },
    {
      threshold: 0.2,
    },
  );

  revealItems.forEach((item) => revealObserver.observe(item));
} else {
  revealItems.forEach((item) => item.classList.add("is-visible"));
}

const whatsappLinks = document.querySelectorAll(
  'a[href^="https://wa.me/"], a[href^="http://wa.me/"], a[href^="https://api.whatsapp.com/"]',
);

whatsappLinks.forEach((link) => {
  link.addEventListener("click", (event) => {
    if (
      event.defaultPrevented ||
      event.button !== 0 ||
      event.metaKey ||
      event.ctrlKey ||
      event.shiftKey ||
      event.altKey
    ) {
      return;
    }

    const url = link.href;

    if (!url) {
      return;
    }

    event.preventDefault();
    openWhatsAppDestination(url, link.target);
  });
});

const forms = document.querySelectorAll("[data-whatsapp-form]");

forms.forEach((form) => {
  const phone = (form.getAttribute("data-phone") || "5511942244263").replace(/\D+/g, "");
  const title = sanitizeSingleLine(
    form.getAttribute("data-title") || "Solicitacao de contato",
    120,
  );
  const status = form.querySelector(".form-status");
  const controls = form.querySelectorAll("input, select, textarea");

  controls.forEach((field) => {
    const clearErrorState = () => {
      setFieldValidity(field, false);

      if (status) {
        status.textContent = "";
        status.style.color = "";
      }
    };

    field.addEventListener("input", clearErrorState);
    field.addEventListener("change", clearErrorState);
  });

  form.addEventListener("submit", (event) => {
    event.preventDefault();

    const requiredFields = form.querySelectorAll("[required]");
    let hasError = false;

    requiredFields.forEach((field) => {
      if (field instanceof HTMLInputElement || field instanceof HTMLTextAreaElement) {
        const safeValue = sanitizeFieldValue(field);

        if (safeValue !== field.value) {
          field.value = safeValue;
        }
      }

      const isEmpty = !field.value.trim();
      const hasNativeError = typeof field.checkValidity === "function" && !field.checkValidity();
      const isInvalid = isEmpty || hasNativeError;

      setFieldValidity(field, isInvalid);
      hasError = hasError || isInvalid;
    });

    if (hasError) {
      if (status) {
        status.textContent = "Preencha os campos obrigatorios antes de enviar.";
        status.style.color = "#a6361d";
      }
      return;
    }

    const lines = [title];

    controls.forEach((field) => {
      if (!field.name) {
        return;
      }

      const safeValue =
        field instanceof HTMLInputElement || field instanceof HTMLTextAreaElement
          ? sanitizeFieldValue(field)
          : sanitizeSingleLine(field.value, 120);

      if (safeValue !== field.value) {
        field.value = safeValue;
      }

      if (!safeValue.trim()) {
        return;
      }

      const id = field.getAttribute("id");
      const label = id ? form.querySelector(`label[for="${id}"]`) : null;
      const labelText = sanitizeSingleLine(label ? label.textContent : field.name, 80);
      lines.push(`${labelText}: ${safeValue}`);
    });

    if (status) {
      status.textContent = "Abrindo o WhatsApp com sua solicitacao preenchida.";
      status.style.color = "#365645";
    }

    const whatsappUrl = new URL(`https://wa.me/${phone}`);
    whatsappUrl.searchParams.set("text", lines.join("\n"));
    openWhatsAppDestination(whatsappUrl.toString(), "_blank");
  });
});

const copyButtons = document.querySelectorAll("[data-copy-text]");

copyButtons.forEach((button) => {
  button.addEventListener("click", async () => {
    const text = button.getAttribute("data-copy-text") || "";
    const targetSelector = button.getAttribute("data-copy-target");
    const status = targetSelector ? document.querySelector(targetSelector) : null;

    if (!text) {
      return;
    }

    try {
      await navigator.clipboard.writeText(text);
      if (status) {
        status.textContent = "E-mail copiado para a area de transferencia.";
        status.style.color = "#365645";
      }
    } catch (error) {
      if (status) {
        status.textContent = "Nao foi possivel copiar automaticamente. Use o e-mail exibido ao lado.";
        status.style.color = "#a6361d";
      }
    }
  });
});
