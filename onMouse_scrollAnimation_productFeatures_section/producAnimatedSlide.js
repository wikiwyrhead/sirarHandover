/*
 *
 * SERVICES | PRODUCTS | INTEGRATION PAGES  Animation JS
 * Dependency : producAnimatedSlide.css
 * */

// Make Section Body reappear after document if ready loading the script
$(document).ready(function () {
  $("div.sections section:not(:first-child)").css({ opacity: "100%" });
});
let isFromLeft = true;
const sections = document.querySelectorAll(".featuresGraph__text");
sections.forEach((section) => {
  // Add the slide-in class to all elements within the section that do not have the specified class suffixes
  const elements = section.querySelectorAll(
    "div:not(.featuresGraph__col--middle):not(.featuresGraph__middleLine):not(.featuresGraph__rectDot):not(.featuresGraph__middleLine)"
  );
  elements.forEach((element) => {
    element.classList.add("slide-in");
  });

  if (isFromLeft) {
    section.classList.add("fromLeft");
  } else {
    section.classList.add("fromRight");
  }
  isFromLeft = !isFromLeft;

  // Create an intersection observer to detect when the section is in full view
  const options = {
    root: null, // set to null to use the viewport as the root
    rootMargin: "0px",
    threshold: 0.0, // when 100% of the section is visible
  };
  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        // When the section is in full view, add the appear class
        entry.target.classList.add("appear");
        observer.unobserve(entry.target);
      }
    });
  }, options);
  observer.observe(section);
});
