<div class="footer">
    <div class="container">
     <div class="row">
  		<div class="col-md-12 bottom">
            <div class="col-md-3 contact_us">
            
      <?php foreach($footer_left as $left_footer): ?>
            <h3><?php echo $left_footer['title'];?></h3>
            <pre><?php echo $left_footer['short_content'];?></pre>
            
            <?php endforeach;?>
            </div>
            
            <div class="col-md-3 latest_news">
            <?php foreach($footer_mid as $mid_footer): ?>
            <h3><?php echo $mid_footer['title'];?></h3>
            <pre><?php echo $mid_footer['short_content'];?></pre>
             <?php endforeach;?>
            </div>
            <div class="col-md-3 follow_us">
            <h3>Follow us</h3>
                <ul>
                    <li><a href="#"><img src="images/facebook.png" /></a></li>
                    <li><a href="#"><img src="images/twitter.png" /></a></li>
                    <li><a href="#"><img src="images/googleplus.png" /></a></li>
                </ul>
            </div>
            <div class="col-md-3 mailing_list">
                <h3>Mailing List</h3>
                <p>Subscribe to our mailing list for offers, news updates and more!</p>
                
                <input id="news-letter" type="text"  placeholder="Your Email">
                <div class="news_subscibe">
                    <input id="subscribe" type="submit">
                </div>
            </div>
           </div>
       </div>
    </div>
</div>
</body>
</html>
