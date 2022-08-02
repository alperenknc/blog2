<aside class="col-md-4">

    <div class="laread-right">
        <form class="laread-form search-form">
            <div class="input"><input type="text" class="searchInput" onkeyup="SendIQuery(this.value)" style="padding:1rem" placeholder="Search..."/></div>
            <i class="fa fa-search"></i>
        </form>
        <div class="searchbox">
            
        </div>
        
        <br>
        <ul class="laread-list barbg-grey">
            <li class="title">NEWSLETTER</li>
            <li class="newsletter-bar">
                <p>Vivamus nec mauris pulvinar leo dignissim sollicitudin eleifend eget velit.</p>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                    <input type="text" class="form-control" placeholder="john@doe.com">
                    <span class="input-group-btn">
                        <button class="btn" type="button"><i class="fa fa-check"></i></button>
                    </span>
                </div>
            </li>
        </ul>

        <div class="laread-list quotes-basic">
            <i class="fa fa-quote-left"></i>
            <p>“The difference between stupidity and genius is that genius has its limits.”</p>
            <span class="whosay">- Albert Einstein </span>
        </div>

        <ul class="laread-list social-bar">
            <li class="title">FOLLOW US</li>
            <li class="social-icons">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-google-plus"></i></a>
                <a href="#"><i class="fa fa-dribbble"></i></a>
            </li>
        </ul>

    </div>

</aside>
<style>
    .shadow-search{
    display: none;
    }
</style>
<script>
    function SendIQuery(icerik){
        if(icerik.length == 0){
        $('.searchbox').addClass('shadow-search');
        }
        else{
        $('.searchbox').removeClass('shadow-search');
            $.ajax({
            url: "{{route('search')}}",
            type: "GET",
            data: "keyword="+icerik,
            success: function(data){
            $('.searchbox').html('<ul class="laread-list">'+data+'</ul>');
            }
        });
        }
        
    }
</script>