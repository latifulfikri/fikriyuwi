<script src="https://kit.fontawesome.com/5c65d8dae4.js" crossorigin="anonymous"></script>
        <script src="{{ url('assets/js/jquery.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

        <script>
        $('.portfolio-item').hover(function(e) {
            $(this).find('.card-body .bg').css({
                "height":"100%",
                "transition":"1s"
            })

            $(this).find('.card-body h2').css({
                "filter":"invert(1)"
            })

            $(this).find('.card-body .d-flex').css({
                "filter":"invert(1)"
            })

            $(this).find('.card-body span').css({
                "filter":"invert(1)"
            })
        },function(e) {
            $(this).find('.card-body .bg').css({
                "height":"0%",
                "transition":"1s"
            })

            $(this).find('.card-body h2').css({
                "filter":"invert(0)"
            })

            $(this).find('.card-body .d-flex').css({
                "filter":"invert(0)"
            })

            $(this).find('.card-body span').css({
                "filter":"invert(0)"
            })
        })

        let skills = $('.slider .slide-track .slide:first-child img').length;
        document.documentElement.style.setProperty(`--skill-length`, `${skills}`);

        let highlights = $('.animated-scroll-down-text line').length;
        document.documentElement.style.setProperty(`--highlight-length`, `${highlights}`);
        
        </script>