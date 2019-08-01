
<section class="ftco-section contact-section">
    <div class="container">
        <div class="row block-9 mb-4">
             <h1 class="pom">Contact our Administrator</h1>
            <div class="col-md-12">
                <form method="post">
                    <div class="form-group">
                        <input type="text" id="firstName" name="ime" class="form-control" placeholder="Your Name">
                    </div>
                    <p id="eror1"></p>
                    <div class="form-group">
                        <input type="text" id="email" name="email" class="form-control" placeholder="Your Email">
                    </div>
                    <p id="erorMail"></p>
                    <div class="form-group">
                        <input type="password" id="password" name="password" class="form-control" placeholder="Your Password">
                    </div>
                    <p id="erorS"></p>
                    <div class="form-group">
                        <textarea name="comment" id="comment" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
                    </div>
                    <p id="erorC"></p>
                    <div class="form-group">
                        <button type="button" onclick="contact();" name="potvrdi" id="potvrdi" value="Send Message" class="btn btn-primary py-3 px-5">Send message</button>
                    </div>
                </form>
                <div id="poruka2"></div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="mapouter"><div class="gmap_canvas"><iframe width="950" height="670" id="gmap_canvas" src="https://maps.google.com/maps?q=new%20york&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.embedgooglemap.net">embedgooglemap.net</a></div><style>.mapouter{text-align:right;height:700px;width:1300px;}.gmap_canvas {overflow:hidden;background:none!important;height:700px;width:1200px;}</style></div>
        </div>
    </div>
</section>
