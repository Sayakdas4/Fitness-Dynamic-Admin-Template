<?php $this->load->view('fincludes/header'); ?>
    <!-- ======= Body Container Start ======= -->
    <section class="bg-grey padtopbot-126">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="bg-white border-rounded-7">
                        <ul class="page-indicator mobile-dd">
                            <li><a href="<?php echo base_url() ?>fitness-recipe">Fitness Recipes</a></li>
                            <li><a href="<?php echo base_url() ?>exercise-video">Exercise Videos</a></li>
                            <li><a href="<?php echo base_url() ?>knowledge-library" class="active">Knowledge Library</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-3 section-spacer">
                    <div class="search-holder">
                        <form action="<?php echo base_url() ?>knowledge-library" method="POST" id="searchList">
                            <div class="input-group">
                                <input class="form-control border-0" type="search" placeholder="Search" name="searchText" value="<?php echo $searchText; ?>" id="example-search-input">
                                <span class="input-group-append">
                                    <button class="btn border-0">
                                        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_0_3494)">
                                                <path d="M6.04129 0C2.71205 0 0 2.71205 0 6.0413C0 9.37054 2.71243 12.0826 6.04129 12.0826C7.42701 12.0832 8.77034 11.6048 9.84375 10.7284L13.9315 14.8166C14.0491 14.9338 14.2083 14.9997 14.3743 14.9997C14.5402 14.9997 14.6994 14.9338 14.817 14.8166C14.875 14.7591 14.921 14.6906 14.9525 14.6152C14.9839 14.5398 15.0001 14.4589 15.0001 14.3772C15.0001 14.2955 14.9839 14.2147 14.9525 14.1392C14.921 14.0638 14.875 13.9954 14.817 13.9379L10.7288 9.8497C11.6058 8.77438 12.0841 7.42891 12.0826 6.0413C12.0826 2.71205 9.37053 0 6.04129 0ZM6.04129 1.25C6.98892 1.25 7.91527 1.531 8.70319 2.05748C9.49112 2.58395 10.1052 3.33225 10.4679 4.20775C10.8305 5.08324 10.9254 6.04661 10.7405 6.97603C10.5557 7.90545 10.0993 8.75918 9.42925 9.42925C8.75918 10.0993 7.90545 10.5557 6.97603 10.7405C6.04661 10.9254 5.08324 10.8305 4.20775 10.4679C3.33225 10.1052 2.58395 9.49112 2.05748 8.7032C1.531 7.91527 1.25 6.98892 1.25 6.0413C1.24873 5.41174 1.37179 4.78812 1.61212 4.20624C1.85245 3.62436 2.20533 3.09566 2.6505 2.6505C3.09566 2.20533 3.62436 1.85245 4.20624 1.61212C4.78812 1.37179 5.41174 1.24873 6.04129 1.25Z" fill="#1D1D1F"/>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_0_3494">
                                                    <rect width="15" height="14.9996" fill="white"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-12 col-md-8 col-lg-9 section-spacer">
                    <div class="right-pan">
                        <div class="row">
                            <div class="col-sm-9">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a></li>
                                        <li class="breadcrumb-item">></li>
                                        <li class="breadcrumb-item"><a href="javascript:;">Explore</a> </li>
                                        <li class="breadcrumb-item">></li>
                                        <li class="breadcrumb-item active" aria-current="page">Blogs</li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="col-sm-3">
                                <div class="next-prev d-flex justify-content-between pt-2">
                                    <?php echo $this->pagination->create_links(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-3 hide-mobile">
                    <div class="recepie-block sticky">
                        <div class="recepie-section">
                            <div class="title">Content preference</div>
                            <div class="items">
                                <ul class="list-inline mb-0 item-block-2 ul_content_preference">
                                    <?php if(!empty($content_preferences)){ foreach($content_preferences as $content_preference){ ?>
                                    <li class="item list-inline-item"><a href="javascript:;" data-content-preference="<?=$content_preference->content_preference_id?>" class="content_preference_active"><?=$content_preference->content_preference_title?></a></li>
                                    <?php } } ?>
                                </ul>
                            </div>
                        </div>
                        <div class="recepie-section border-bottom-0 mb-0 pb-0">
                            <div class="title">Categories</div>
                            <div class="items">
                                <ul class="list-inline mb-0 item-block-2">
                                    <?php if(!empty($categoriess)){ foreach($categoriess as $categories){ ?>
                                    <li class="item list-inline-item">
                                        <article class="feature1">
                                            <input type="checkbox" class="input filter_categoriesID" name="filter_categoriesID[]" id="filter_categoriesID" value="<?=$categories->categories_id?>" data-categories="<?=$categories->categories_id?>">
                                            <div><span><?=$categories->categories_title?></span></div>
                                        </article>
                                    </li>
                                    <?php } } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-8 col-lg-9">
                    <div class="row" id="knowledge_library">
                        <?php if(!empty($knowledge_librarys)){ foreach($knowledge_librarys as $knowledge_library){ ?> 
                        <div class="col-sm-12 col-md-4">
                            <div class="recepie-item-block">
                                <div class="recepie-content">
                                    <div class="recepie-img-holder">
                                        <?php if($knowledge_library->content_preference_id == 2){ ?>
                                        <a style="color: #000000;" href="<?php echo base_url().'knowledge-library-details/'.$knowledge_library->knowledge_library_id; ?>"><img src="<?php echo assets_url(); ?>uploads/<?php echo $knowledge_library->image_files; ?>" class="d-block w-100" alt="..."></a>
                                        <?php } if($knowledge_library->content_preference_id == 1){ ?>
                                        <iframe width="230" height="180" src="<?=$knowledge_library->image?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                        <?php } ?>
                                    </div>
                                    <div class="recepie-details">
                                        <div class="timings padbot-7">
                                            <span><?=$knowledge_library->content_preference_title?></span>
                                            <span class="bullet-space">
                                                <svg width="5" height="5" viewBox="0 0 5 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="2.5" cy="2.5" r="2.5" fill="#1D1D1F"/>
                                                </svg>
                                            </span>
                                            <span><?=$knowledge_library->time?></span>
                                        </div>
                                        <div class="item-name matchheight" title="<?php echo $knowledge_library->title; ?>"><a class="dot-link dot-two-line text-black matchheight" href="<?php echo base_url().'knowledge-library-details/'.$knowledge_library->knowledge_library_id; ?>"><?php echo $knowledge_library->title; ?></a></div>
                                        <div class="priority-btn">
                                            <ul>
                                                <?php if($knowledge_library->cat){ $cat = explode(",", $knowledge_library->cat); foreach($cat as $cat_data){
                                                    $curr_cat_data = explode("-", $cat_data);
                                                    $categories_id = $curr_cat_data[1];
                                                    $categories_name = $curr_cat_data[0];
                                                ?>
                                                    <?php if($categories_id == 1){ ?>
                                                    <li class="green-priority"><a href="javascript::"><?=$categories_name?></a></li>
                                                    <?php } if($categories_id == 2){ ?>
                                                    <li class="blue-priority"><a href="javascript::"><?=$categories_name?></a></li>
                                                    <?php } if($categories_id == 3){ ?>
                                                    <li class="brown"><a href="javascript::"><?=$categories_name?></a></li>
                                                    <?php } if($categories_id == 4){ ?>
                                                    <li class="yellow"><a href="javascript:;"><?=$categories_name?></a></li>
                                                    <?php } if($categories_id == 5){ ?>
                                                    <li class="strawbery"><a href="javascript:;"><?=$categories_name?></a></li>
                                                    <?php } if($categories_id == 6){ ?>
                                                    <li class="red-priority"><a href="javascript:;"><?=$categories_name?></a></li>
                                                <?php } } } ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ======= Body Container End ======= -->
<?php $this->load->view('fincludes/footer'); ?>

<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('ul.pagination li a').click(function (e) {
            e.preventDefault();            
            var link = jQuery(this).get(0).href;            
            var value = link.substring(link.lastIndexOf('/') + 1);
            jQuery("#searchList").attr("action", "<?php echo base_url(); ?>" + "knowledge-library/" + value);
            jQuery("#searchList").submit();
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.content_preference_active').click(function() {
            $(this).toggleClass("active");
            $(this).attr("data-content-preference");
            filter_knowledge_library();
        });

        $('.filter_categoriesID').click(function(){
            var filter_categoriesID = new Array();
            $("input:checked").each(function() {
                filter_categoriesID.push($(this).val());
            });
            filter_knowledge_library(JSON.stringify(filter_categoriesID));
        });
    });

    function filter_knowledge_library(filter_categoriesID = null)
    {
        var content_preferenceID = $(".ul_content_preference").find(".active").attr("data-content-preference");
        $.ajax({
           type: 'POST',
           url: '<?php echo base_url().'home/knowledge_library_ajax'?>',
           data: {'content_preferenceID':content_preferenceID, 'filter_categoriesID':filter_categoriesID},
           // dataType: "JSON",
           success: function(response) {
                $("#knowledge_library").html(response);
            }
        });
    }
</script>