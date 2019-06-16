$(document).ready(function(){
    
    // ==========================
    // Header-search
    // ==========================

    $('.header').on({
        mouseenter: function(){
            $(this).css({
                'border': '1px solid #d6d6d6',
                'transition': 'all 0.5s ease'
            })
        },
        mouseleave: function(){
            $(this).css({
                'transition': 'all 0.2s ease',
                'border': '1px solid transparent'
            })
        },
        focus: function(){
            $(this).css({
                'background': '#fff',
                'border': '1px solid #d6d6d6',
                'transition': 'all 0.2s ease'
            })
        },
        blur: function(){
            $(this).css({
                'background': '#eee',
                'transition': 'all 0.3s ease',
                'border': '1px solid transparent'
            })
        }
    }, 'form')

    // ==========================
    // Main-search
    // ==========================
    $('.main-header').on({
        mouseenter: function() {
            $(this).css({
                'transition': 'all 0.5s ease',
                'boxShadow': '0 0 0 5px rgba(0,0,0,.1)'
            });
        },
        mouseleave: function() {
            $(this).css({
                'boxShadow': 'none',
                'transition': 'all 0.5s ease'
            });
        },
        focus: function() {
            $(this).css({
                'transition': 'all 0.2s ease',
                'boxShadow': '0 0 0 5px rgba(0,0,0,.2)'
            });
        },
        blur: function() {
            $(this).css({
                'boxShadow': 'none',
                'transition': 'all 0.2s ease'
            });
        }
    }, '.main-header-search-form')

    // ==========================
    // Login
    // ==========================

    $('.auth-a').on({
        mouseenter: function() {
            $(this).css({
                'color' : '#FFF',
                'background': '#5A009D',
                'transition': 'all 0.2s ease-in-out'
            });
        },
        mouseleave: function() {
            $(this).css({
                'color' : '#333',
                'background': '#EEE',
                'transition': 'all 0.2s ease-in-out'
            });
        },
        mousedown: function(){
            $(this).css({
                'background': '#7c21bf',
                'transition': 'all 0.2s ease-in-out'
            })
        },
        mouseup: function(){
            $(this).css({
                'background': '#7A009D',
                'transition': 'all 0.2s ease-in-out'
            })
        }
    })

    // ==========================
    // Registartion
    // ==========================

    $('.reg-a, .a-link').on({
        mouseenter: function() {
            $(this).css({
                'color' : '#333',
                'background': '#EEE',
                'transition': 'all 0.2s ease-in-out'
            });
        },
        mouseleave: function() {
            $(this).css({
                'color' : '#FFF',
                'background': '#5A009D',
                'transition': 'all 0.2s ease-in-out'
            });
        },
        mousedown: function(){
            $(this).css({
                'background': '#e0dfdf',
                'transition': 'all 0.2s ease-in-out'
            })
        },
        mouseup: function(){
            $(this).css({
                'background': '#d2cece',
                'transition': 'all 0.2s ease-in-out'
            })
        }
    })

    // ==========================
    // Login
    // ==========================

    $('.fg-submit').on({
        mouseenter: function() {
            $(this).css({
                'color' : '#333',
                'background': '#EEE',
                'transition': 'all 0.2s ease-in-out'
            });
        },
        mouseleave: function() {
            $(this).css({
                'color' : '#FFF',
                'background': '#5A009D',
                'transition': 'all 0.2s ease-in-out'
            });
        },
        mousedown: function(){
            $(this).css({
                'background': '#e0dfdf',
                'transition': 'all 0.2s ease-in-out'
            })
        },
        mouseup: function(){
            $(this).css({
                'background': '#d2cece',
                'transition': 'all 0.2s ease-in-out'
            })
        }
    })

    // ==========================
    // Add Image
    // ==========================
     $('.profile-submit').on({
        mouseenter: function() {
            $(this).css({
                'color' : '#fff',
                'background': '#37a866',
                'transition': 'all 0.2s ease-in-out'
            });
        },
        mouseleave: function() {
            $(this).css({
                'color' : '#fff',
                'background': '#3cb46e',
                'transition': 'all 0.2s ease-in-out'
            });
        },
        mousedown: function(){
            $(this).css({
                'background': '#3c9e65',
                'transition': 'all 0.2s ease-in-out'
            })
        },
        mouseup: function(){
            $(this).css({
                'background': '#37a866',
                'transition': 'all 0.2s ease-in-out'
            })
        }
    })

    // ==========================
    // Open modal window
    // ==========================
    $('.mpa-button').on({
        mouseenter: function() {
            $(this).css({
                'color' : '#333',
                'transition': 'all 0.2s ease-in-out'
            });
        },
        mouseleave: function() {
            $(this).css({
                'color' : '#999',
                'transition': 'all 0.2s ease-in-out'
            });
        },
        mousedown: function(){
            $(this).css({
                'color': '#c3c3c3',
                'transition': 'all 0.2s ease-in-out'
            })
        },
        mouseup: function(){
            $(this).css({
                'color': '#333',
                'transition': 'all 0.2s ease-in-out'
            })
        }
    })

    // ==========================
    // Delete image open window
    // ==========================
    $('.option-button').on({
        mouseenter: function() {
            $(this).css({
                'color' : '#333',
                'transition': 'all 0.2s ease-in-out'
            });
        },
        mouseleave: function() {
            $(this).css({
                'color' : '#999',
                'transition': 'all 0.2s ease-in-out'
            });
        },
        mousedown: function(){
            $(this).css({
                'color': '#c3c3c3',
                'transition': 'all 0.2s ease-in-out'
            })
        },
        mouseup: function(){
            $(this).css({
                'color': '#333',
                'transition': 'all 0.2s ease-in-out'
            })
        }
    })

    // ==========================
    // Delete image open window
    // ==========================
    $('.mdcb-item').on({
        mouseenter: function() {
            $(this).css({
                'color' : '#fff',
                'background': '#d35657',
                'transition': 'all 0.2s ease-in-out'
            });
        },
        mouseleave: function() {
            $(this).css({
                'color' : '#333',
                'background': '#fff',
                'transition': 'all 0.2s ease-in-out'
            });
        },
        mousedown: function(){
            $(this).css({
                'background': '#c1494a',
                'transition': 'all 0.2s ease-in-out'
            })
        },
        mouseup: function(){
            $(this).css({
                'background': '#d35657',
                'transition': 'all 0.2s ease-in-out'
            })
        }
    })

    // ==========================
    // Edit image open window
    // ==========================
    $('.up-group-item').on({
        mouseenter: function() {
            $(this).css({
                'color' : 'rgba(255, 255, 255, 1)',
                'background': 'rgba(51, 51, 51, 0.5)',
                'transition': 'all 0.3s ease-in-out'
            });
        },
        mouseleave: function() {
            $(this).css({
                'color' : 'rgba(255, 255, 255, 0)',
                'background': 'rgba(51, 51, 51, 0)',
                'transition': 'all 0.3s ease-in-out'
            });
        },
        mousedown: function(){
            $(this).css({
                'color': 'rgb(200, 199, 199)',
                'transition': 'all 0.3s ease-in-out'
            })
        },
        mouseup: function(){
            $(this).css({
                'color': 'rgba(255, 255, 255, 1)',
                'transition': 'all 0.3s ease-in-out'
            })
        }
    })


    // var $grid = $('.grid').imagesLoaded( function() {
    //     $grid.masonry({
    //         itemSelector: '.grid-item',
    //         percentPosition: true,
    //         columnWidth: '.grid-sizer'
    //     }); 
    // });

    //$('.grid-item').each(function(index, elem) {
    //    console.log("Элемент:" + elem.tagName + " " + $(elem).prop("className"));        
    //});

})