<script src="{{asset('js/amazeui.min.js')}}"></script>
<script type="text/javascript">
    function imj2(){
        this.init();
    }
    imj2.prototype = {
        constructor: imj2,
        init: function(){
            this._initBackTop();
        },
        _initBackTop: function(){
            var $backTop = this.$backTop = $('<div class="m-top-cbbfixed">'+
                        '<a class="m-top-go m-top-cbbtn">'+
                            '<span class="m-top-goicon"></span>'+
                        '</a>'+
                    '</div>');
            $('body').append($backTop);
            $backTop.click(function(){
                $("html, body").animate({
                    scrollTop: 0
                }, 120);
            });
            var timmer = null;
            $(window).scroll(function(){
                var d = $(document).scrollTop(),
                e = $(window).height();
                0 < d ? $backTop.css("bottom", "10px") : $backTop.css("bottom", "-90px");
                clearTimeout(timmer);
                timmer = setTimeout(function() {
                    clearTimeout(timmer)
                },100);
            });
        }
    }
    var imj2 = new imj2();
</script>