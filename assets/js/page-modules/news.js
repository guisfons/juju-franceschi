window.addEventListener('DOMContentLoaded', function() {
    console.log('Javascript do módulo news');

    $$('.news__item').forEach(function(item) {
        item.addEventListener('mouseenter', function() {
            $$('.news__item').forEach(function(blur) {
                blur.style.filter = 'blur(3px)'
            })
            this.style.filter = 'blur(0)'
        })
        item.addEventListener('mouseleave', function() {
            $$('.news__item').forEach(function(blur) {
                blur.style.filter = 'blur(0)'
            })
        })
    })
})