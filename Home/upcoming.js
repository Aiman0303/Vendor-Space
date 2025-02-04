let slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            let slides = document.getElementsByClassName("slides");
            if (n > slides.length) { slideIndex = 1; }
            if (n < 1) { slideIndex = slides.length; }

            for (let i = 0; i < slides.length; i++) {
                slides[i].classList.remove("active");
            }

            slides[slideIndex - 1].classList.add("active");
        }

        function createEvent() {
            // Add functionality for creating an event
            alert("Create Event button clicked!");
        }

        function findEvent() {
            // Add functionality for finding an event
            alert("Find Event button clicked!");
        }

let currentIndex = 0;

function changeSlide(direction) {
    const slides = document.querySelector('.event-slides');
    const totalSlides = slides.children.length;
        
    currentIndex += direction;
        
    // Loop back to the first slide if we go past the last slide
    if (currentIndex >= totalSlides) {
        currentIndex = 0;
    } else if (currentIndex < 0) {
        currentIndex = totalSlides - 1;
    }
        
    // Move the slides
    slides.style.transform = 'translateX(' + (-currentIndex * 100) + '%)';
}