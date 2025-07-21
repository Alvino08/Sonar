import './bootstrap';
import './sidebar';

import gsap from "gsap";
import Alpine from 'alpinejs';
import { SplitText } from "gsap/SplitText";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import { ScrambleTextPlugin } from "gsap/ScrambleTextPlugin";

gsap.registerPlugin(ScrollTrigger, ScrambleTextPlugin);
gsap.registerPlugin(SplitText);

window.Alpine = Alpine
Alpine.start()



window.onload = () => {
  document.body.classList.remove('invisible'); // Tampilkan body setelah semuanya load

  const firstSection = document.getElementById('first-section');
  const secondSection = document.getElementById('second-section');

  const firstImg = document.getElementById('img-1');
  const secondImg = document.getElementById('img-2');
  const thirdImg = document.getElementById('img-3');

  const tl = gsap.timeline();

  tl.fromTo(secondImg, 
    { scale: 5, opacity: 0 }, 
    { scale: 1, opacity: 1, duration: 1, ease: "power2.out" }
  )
  .fromTo(firstImg, 
    { x: 150, opacity: 0 }, 
    { x: 0, opacity: 1, duration: 1, ease: "power2.out" }, 
    1.2
  )
  .fromTo(thirdImg, 
    { x: -150, opacity: 0 }, 
    { x: 0, opacity: 1, duration: 1, ease: "power2.out" }, 
    1.2
  )
  // .fromTo(secondImg,
  //   { scale: 1, opacity: 1 },
  //   { scale: 5, opacity: 0, duration: 1, ease: "power2.in" },
  //   2.7
  // )
  .to(secondImg ,{
    opacity: 0.8,
    scale : 0.8,
    duration: 0.5
    }, 2.7
  )
  .to(secondImg ,{
    scale : 5,
    duration: 0.5,
    opacity: 0
    }, ">"
  )
  .to(firstImg, {
    opacity: 0.5,
    x: -200,
    ease: "power1.inOut",
    duration: 0.5,
  }, 2.9)
  .to(thirdImg, {
    opacity: 0.5,
    x: 200,
    ease: "power1.inOut",
    duration: 0.5,
  }, 2.9)
  .to(firstImg, {
    x: 400,
    opacity: 0,
    ease: "power2.in",
    duration: 0.5,
  }, ">")
  .to(thirdImg, {
    x: -400,
    opacity: 0,
    ease: "power2.in",
    duration: 0.5,
  }, "<")

  setTimeout(() => {
  // Aktifkan scroll dengan mengganti class
  firstSection.className = "w-full bg-black overflow-x-hidden";
  firstSection.innerHTML = secondSection.innerHTML;

  const leftImg = document.getElementById('left-photo');
  const rightImg = document.getElementById('right-photo');

  document.querySelector("#sonar").classList.add("split");
  document.querySelector("#audio").classList.add("split");
  document.querySelector("#post").classList.add("split");

  document.fonts.ready.then(() => {
    gsap.set(".split", { opacity: 1 });

    const splitInstances = [];
    const allLines = [];

    document.querySelectorAll(".split").forEach((el) => {
      const split = new SplitText(el, {
        type: "lines",
        linesClass: "line"
      });
      splitInstances.push(split);
      allLines.push(...split.lines);
    });

    // Animasi teks
    gsap.from(allLines, {
      duration: 1,
      yPercent: 100,
      opacity: 0,
      stagger: 0.2,
      onComplete: () => {
        // Animasi kiri
        gsap.fromTo(leftImg,
          { x: -150, opacity: 0 },
          {
            x: 0,
            opacity: 1,
            duration: 1,
            ease: "power2.out",
            onComplete: () => {
              // Animasi kanan
              gsap.fromTo(rightImg,
                { x: 150, opacity: 0 },
                {
                  x: 0,
                  opacity: 1,
                  duration: 1,
                  ease: "power2.out",
                  onComplete: () => {
                    // ✅ Aktifkan scroll setelah SEMUA animasi selesai
                    document.body.style.overflowY = 'auto';
                    gsap.from(line1, {
                        scrollTrigger: {
                          trigger: line1,
                          start: "top 90%",
                          toggleActions: "restart reset reset reset"
                        },
                        opacity: 0,
                        scale: 1,
                        duration: 1.2
                      });

                      gsap.from(line2a, {
                        scrollTrigger: {
                          trigger: line2a,
                          start: "top 90%",
                          toggleActions: "restart reset reset reset"
                        },
                        opacity: 0,
                        scale: 1,
                        duration: 1.2
                      });

                      gsap.from(line2b, {
                        scrollTrigger: {
                          trigger: line2b,
                          start: "top 90%",
                          toggleActions: "restart reset reset reset"
                        },
                        opacity: 0,
                        scale: 1,
                        duration: 1.2
                      });

                      gsap.from([line3a, line3b], {
                        scrollTrigger: {
                          trigger: line3a,
                          start: "top 90%",
                          toggleActions: "restart reset reset reset"
                        },
                        opacity: 0,
                        scale: 1,
                        duration: 1.2
                      });

                      gsap.from(line4, {
                        scrollTrigger: {
                          trigger: line4,
                          start: "top 90%",
                          toggleActions: "restart reset reset reset"
                        },
                        opacity: 0,
                        scale: 1,
                        duration: 1.2
                      });
                  } 
                }
              );
            }
          }
        );
      }
    });
  });
}, 4500);
};

// function animateScramble(id, finalText, delay = 0) {
//   gsap.fromTo(`#${id}`, 
//     { textContent: "" }, 
//     {
//       scrambleText: {
//         text: finalText,
//         chars: "upperAndLowerCase",
//         revealDelay: 0.5,
//         speed: 0.4,
//         opacity: 0
//       },
//       duration: 1.5,
//       opacity: 1,
//       scrollTrigger: {
//         trigger: `#${id}`,
//         start: "top 70%", // ketika teks hampir masuk viewport
//         toggleActions: "restart reset reset reset"
//       },
//       delay: delay
//     }
//   );
// }


// // Panggil animasi untuk tiap elemen
// animateScramble("line1", "We strive");
// animateScramble("line2a", "to");
// animateScramble("line2b", "create");
// animateScramble("line3a", "sounds");
// animateScramble("line3b", "with");
// animateScramble("line4", "a purpose.");



  // setTimeout(() => {
  //   // Aktifkan scroll dengan mengganti class
  //   firstSection.className = "w-full bg-black overflow-x-hidden";
  //   firstSection.innerHTML = secondSection.innerHTML;

  //   const leftImg = document.getElementById('left-photo');
  //   const rightImg = document.getElementById('right-photo');

  //   const line1 = document.getElementById('line1');
  //   const line2a = document.getElementById('line2a');
  //   const line2b = document.getElementById('line2b');
  //   const line3a = document.getElementById('line3a');
  //   const line3b = document.getElementById('line3b');
  //   const line4 = document.getElementById('line4');

    

  //   document.querySelector("#sonar").classList.add("split");
  //   document.querySelector("#audio").classList.add("split");
  //   document.querySelector("#post").classList.add("split");

  //   document.fonts.ready.then(() => {
  //     gsap.set(".split", { opacity: 1 });

  //     const splitInstances = [];
  //     const allLines = [];

  //     document.querySelectorAll(".split").forEach((el) => {
  //       const split = new SplitText(el, {
  //         type: "lines",
  //         linesClass: "line"
  //       });
  //       splitInstances.push(split);
  //       allLines.push(...split.lines);
  //     });

  //     // Animasi teks masuk
  //     gsap.from(allLines, {
  //       duration: 1,
  //       yPercent: 100,
  //       opacity: 0,
  //       stagger: 0.2,
  //       onComplete: () => {
  //         gsap.fromTo(leftImg,
  //           { x: -150, opacity: 0 },
  //           {
  //             x: 0,
  //             opacity: 1,
  //             duration: 1,
  //             ease: "power2.out",
  //             onComplete: () => {
  //               gsap.fromTo(rightImg,
  //                 { x: 150, opacity: 0 },
  //                 {
  //                   x: 0,
  //                   opacity: 1,
  //                   duration: 1,
  //                   ease: "power2.out",
  //                   onComplete: () => {
  //                     document.body.style.overflowY = 'auto';

  //                     gsap.set(".panel", {
  //                       zIndex: (i, target, targets) => targets.length - i
  //                     });

  //                     gsap.to(".panel:not(:last-child)", {
  //                       yPercent: -100,
  //                       ease: "none",
  //                       stagger: 0.5,
  //                       scrollTrigger: {
  //                         trigger: "#container",
  //                         start: "top top",
  //                         end: "+=200%",
  //                         scrub: true,
  //                         pin: true
  //                       }
  //                     });

  //                     // ScrollTrigger animation untuk line1 - line4
  //                     
  //                   }
  //                 }
  //               );
  //             }
  //           }
  //         );
  //       }
  //     });
  //   });
  // }, 4500);


    // setTimeout(() => {
  //   // Ambil konten dari #container di dalam secondSection
  //   const containerHTML = secondSection.querySelector("#container").outerHTML;

  //   // Aktifkan scroll dan ganti isi firstSection
  //   firstSection.className = "w-full bg-black overflow-x-hidden";
  //   firstSection.innerHTML = containerHTML;

  //   // Tunggu render selesai
  //   requestAnimationFrame(() => {
  //     const leftImg = document.getElementById('left-photo');
  //     const rightImg = document.getElementById('right-photo');

  //     const line1 = document.getElementById('line1');
  //     const line2a = document.getElementById('line2a');
  //     const line2b = document.getElementById('line2b');
  //     const line3a = document.getElementById('line3a');
  //     const line3b = document.getElementById('line3b');
  //     const line4 = document.getElementById('line4');

  //     const sonar = document.getElementById("sonar");
  //     const audio = document.getElementById("audio");
  //     const post = document.getElementById("post");

  //     sonar.classList.add("split");
  //     audio.classList.add("split");
  //     post.classList.add("split");

  //     document.fonts.ready.then(() => {
  //       gsap.set(".split", { opacity: 1 });

  //       const splitInstances = [];
  //       const allLines = [];

  //       document.querySelectorAll(".split").forEach((el) => {
  //         const split = new SplitText(el, {
  //           type: "lines",
  //           linesClass: "line"
  //         });
  //         splitInstances.push(split);
  //         allLines.push(...split.lines);
  //       });

  //       // Animasi teks masuk
  //       gsap.from(allLines, {
  //         duration: 1,
  //         yPercent: 100,
  //         opacity: 0,
  //         stagger: 0.2,
  //         onComplete: () => {
  //           gsap.fromTo(leftImg,
  //             { x: -150, opacity: 0 },
  //             {
  //               x: 0,
  //               opacity: 1,
  //               duration: 1,
  //               ease: "power2.out",
  //               onComplete: () => {
  //                 gsap.fromTo(rightImg,
  //                   { x: 150, opacity: 0 },
  //                   {
  //                     x: 0,
  //                     opacity: 1,
  //                     duration: 1,
  //                     ease: "power2.out",
  //                     onComplete: () => {
  //                       // Aktifkan scroll
  //                       document.body.style.overflowY = 'auto';

  //                       // Layered pinning setup
  //                       gsap.set(".panel", {
  //                         zIndex: (i, target, targets) => targets.length - i
  //                       });

  //                       gsap.to(".panel:not(:last-child)", {
  //                         yPercent: -100,
  //                         ease: "none",
  //                         scrollTrigger: {
  //                           trigger: "#container",
  //                           start: "top top",
  //                           end: "+=200%",
  //                           scrub: true,
  //                           pin: true,
  //                           anticipatePin: 1
  //                         }
  //                       });

  //                       // Scroll-triggered animasi teks halaman kedua
  //                       const animatedLines = [line1, line2a, line2b, line3a, line3b, line4];
  //                       animatedLines.forEach(line => {
  //                         gsap.from(line, {
  //                           scrollTrigger: {
  //                             trigger: line,
  //                             start: "top 90%",
  //                             toggleActions: "restart none reset none"
  //                           },
  //                           opacity: 0,
  //                           scale: 1,
  //                           duration: 1.2
  //                         });
  //                       });
  //                     }
  //                   }
  //                 );
  //               }
  //             }
  //           );
  //         }
  //       });
  //     });
  //   });
  // }, 4500);