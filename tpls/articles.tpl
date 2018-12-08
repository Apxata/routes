<div class="main">
    <div class="content container">
      <div class="row">
        <div class="article-list">
            {foreach $articles as $article }
            <div class="article col-md-8 col-md-offset-1">

                    <h2 class="a-title">{$article['subject']}</h2>
                    <div class="a-info">{$article['create_date']}</div>
                    <div class="a-content">{$article['full_text']}</div>
                    <!-- a-content -->
                    <div class="a-footer"><a href="show.php?article_id={$article.id}">{$article['count_comments']} коммент.</a></div>
            </div>
            {/foreach}
            <!-- article -->
         </div>
        <!-- article-list -->
      </div>
        <!-- row  -->
    </div>
    <!-- content container -->
</div> 
    <!-- end of main  -->
