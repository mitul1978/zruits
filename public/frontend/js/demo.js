(function() {

    // Declaring variables

    var paths = document.querySelectorAll('path');
    var button = document.querySelector('button');
    var animating = true;
    var width = window.innerWidth || document.body.clientWidth;
    var height = window.innerHeight || document.body.clientHeight;
    var optionsBackground, bsBackground, optionsPath, bsPath, optionsErase, bsErase;


    // Random curves for background

    optionsBackground = {
        animation: 'points',
        points: 10,
        inkAmount: 5,
        size: 300,
        frames: 10,
        frameAnimation: true,
        splashing: true,
        color: '#ccc',
        // image: 'images/background.jpg',
        centered: true,
        queue: true,
        width: width,
        height: height
    };
    bsBackground = new Brushstroke(optionsBackground);


    // Options for text (SVG paths)

    optionsPath = {
        animation: 'path',
        inkAmount: 2,
        frames: 20,
        frameAnimation: true,
        color: 'white',
        width: 1000,
        height: 300
    };
    bsPath = new Brushstroke(optionsPath);


    // Function to start the animation

    function runAnimation() {
        // Draw a straight line
        bsBackground.draw({
            points: [0, height / 2 - 40, width, height / 3]
        });

        // Draw another straight line
        bsBackground.draw({
            points: [width, height / 2, 0, height / 1.5 - 40]
        });
        bsBackground.draw({
            points: [width, height / 2, 0.5, height / 1.5 - 40]
        });

        // Draw a curve generated using 20 random points
        // bsBackground.draw({
        //     inkAmount: 3,
        //     frames: 20,
        //     size: 50,
        //     splashing: true,
        //     points: 10,
        //     end: toggleButton
        // });

        // Draw each letter of the text, with a delay among them
        var delay = 0;
        for (var i = 0; i < paths.length; i++) {
            bsPath.draw({path: paths[i], delay: delay});
            delay += 0.5;
        }
    }


    // Erase and run again

    optionsErase = {
        queue: true,
        size: 300,
        padding: 0,
        overlap: 100,
        inkAmount: 20,
        frames: 100,
        frameAnimation: true,
        color: '#fff',
        width: width,
        height: height,
        end: function () {
            // Clear all canvas and run animation
            bsBackground.clear();
            bsPath.clear();
            bsErase.clear();
             runAnimation();
        }
    };
    bsErase = new Brushstroke(optionsErase);


    // Run again button
    
    button.addEventListener('click', function () {
        if (!animating) {
            toggleButton();
            bsErase.draw();
        }
    });

    function toggleButton() {
        button.classList.toggle('hidden');
        animating = !animating;
    }


$("body").on({
    mouseenter: function() {console.log('1');
       runAnimation();
    },
    mouseleave: function() {
        bsErase.draw();
    }
}, ".home-carousel");



})();