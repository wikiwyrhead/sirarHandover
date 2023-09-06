/*
 *
 * HOME PAGE Animation JS
 * Dependency : animateScroll.css
 * */

//Get class For Non-Repeating animation Elements
const animatedElementsOnce = document.querySelectorAll(
  ".textImage__contentTitle, .textImage.section, .leaderCard__name, .leaderCard__text, .leaderCard__position"
);

//Get class  For Repeating animation Elements
const animatedElementsRepeat = document.querySelectorAll(
  ".contact__slogan--border, .contact__slogan--pink, .contact__slogan--violet"
);

// Helper function to check if an element is in view
const isInView = (element) => {
  const elementPosition = element.getBoundingClientRect().top;
  const screenPosition = window.innerHeight / 1.2;
  return elementPosition < screenPosition;
};

// Trigger animations on scroll
window.addEventListener("scroll", () => {
  animatedElementsOnce.forEach((element) => {
    if (isInView(element) && !element.classList.contains("animated")) {
      element.classList.add("animated");
    }
  });

  animatedElementsRepeat.forEach((element) => {
    if (isInView(element)) {
      element.classList.add("animated");
    } else {
      element.classList.remove("animated");
    }
  });
});
