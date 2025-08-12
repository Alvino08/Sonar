  import gsap from "gsap";
import Alpine from 'alpinejs';
import { ScrollTrigger } from "gsap/ScrollTrigger";
import { SplitText } from "gsap/SplitText";

gsap.registerPlugin(ScrollTrigger);
  
  function setupScrollTrigger2() {
    // Set initial state
    gsap.set(".letter-s, .letter-o, .letter-n, .letter-a, .letter-r", {
      opacity: 0,
    });

    // Buat timeline scroll-triggered
    const tl = gsap.timeline({
      scrollTrigger: {
        trigger: "#logo-sonar",
        start: "top 90%",
        toggleActions: "restart none none reset"
      }
    });

    // Tambahkan animasi per huruf ke timeline
    tl.to(".letter-s", { opacity: 1, y: 0, duration: 0.5 })
      .to(".letter-o", { opacity: 1, y: 0, duration: 0.5 }, ">")
      .to(".letter-n", { opacity: 1, y: 0, duration: 0.5 }, ">")
      .to(".letter-a", { opacity: 1, y: 0, duration: 0.5 }, ">")
      .to(".letter-r", { opacity: 1, y: 0, duration: 0.5 }, ">");
  }

  // Panggil fungsinya saat halaman siap
  setupScrollTrigger2();