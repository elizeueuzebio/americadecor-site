const navToggle = document.querySelector(".nav-toggle");
const siteNav = document.querySelector(".site-nav");

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

const forms = document.querySelectorAll("[data-whatsapp-form]");

forms.forEach((form) => {
  const phone = form.getAttribute("data-phone") || "5511942244263";
  const title = form.getAttribute("data-title") || "Solicitacao de contato";
  const status = form.querySelector(".form-status");

  form.addEventListener("submit", (event) => {
    event.preventDefault();

    const requiredFields = form.querySelectorAll("[required]");
    let hasError = false;

    requiredFields.forEach((field) => {
      const isEmpty = !field.value.trim();
      field.setAttribute("aria-invalid", String(isEmpty));
      hasError = hasError || isEmpty;
    });

    if (hasError) {
      if (status) {
        status.textContent = "Preencha os campos obrigatorios antes de enviar.";
        status.style.color = "#a6361d";
      }
      return;
    }

    const controls = form.querySelectorAll("input, select, textarea");
    const lines = [title];

    controls.forEach((field) => {
      if (!field.name || !field.value.trim()) {
        return;
      }

      const id = field.getAttribute("id");
      const label = id ? form.querySelector(`label[for="${id}"]`) : null;
      const labelText = label ? label.textContent.trim() : field.name;
      lines.push(`${labelText}: ${field.value.trim()}`);
    });

    if (status) {
      status.textContent = "Abrindo o WhatsApp com sua solicitacao preenchida.";
      status.style.color = "#365645";
    }

    const whatsappUrl = `https://wa.me/${phone}?text=${encodeURIComponent(lines.join("\n"))}`;
    window.open(whatsappUrl, "_blank", "noopener,noreferrer");
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
