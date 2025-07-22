import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";


gsap.registerPlugin(ScrollTrigger);

// Layered Pinning from Bottom
  gsap.set(".panel", {
    zIndex: (i, el, arr) => arr.length - i
  });

  gsap.to(".panel:not(:last-child)", {
    yPercent: -100,
    ease: "none",
    stagger: 0.5,
    scrollTrigger: {
      trigger: "#container",
      start: "top top",
      end: "+=200%",
      scrub: true,
      pin: true
    }
  });


gsap.set(".panel", {zIndex: (i, target, targets) => targets.length - i});


// each time the window updates, we should refresh ScrollTrigger and then update LocomotiveScroll. 
ScrollTrigger.addEventListener("refresh", () => locoScroll.update());

// after everything is set up, refresh() ScrollTrigger and update LocomotiveScroll because padding may have been added for pinning, etc.
ScrollTrigger.refresh();
