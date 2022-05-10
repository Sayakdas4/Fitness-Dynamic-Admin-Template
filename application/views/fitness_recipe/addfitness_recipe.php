<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        fitness_recipe
    </h2>
    <div class="row">
        <?php 
            $this->load->helper('form');
            $error = $this->session->flashdata('error');
            if($error) {
        ?>
        <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-6 text-white"> <?php echo $this->session->flashdata('error'); ?> <i data-feather="x" class="w-4 h-4 ml-auto"></i> </div>
        <?php } ?>
        <?php 
            $success = $this->session->flashdata('success');
            if($success) { 
        ?>  
        <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-9 text-white"> <?php echo $this->session->flashdata('success'); ?> <i data-feather="x" class="w-4 h-4 ml-auto"></i> </div>
        <?php } ?>
        
        <div class="row">
            <div class="col-md-12">
                <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
            </div>
        </div>
    </div>
</div>
<div class="grid grid-cols-2 gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-6">
        <!-- BEGIN: Form Validation -->
        <div class="intro-y box">
            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                <h2 class="font-medium text-base mr-auto">
                    Enter Detils
                </h2>
            </div>
            <div class="p-5" id="form-validation">
                <div class="preview">
                    <?php $this->load->helper("form"); ?>
                    <form role="form" class="validate-form" id="fitness_recipe" enctype='multipart/form-data' action="<?php echo base_url() ?>addfitness_recipeConfig" method="post">
                        <div class="grid grid-cols-2 gap-2">
                            <div class="input-form mt-3">
                                <label for="title" class="flex flex-col sm:flex-row"> Name <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600">*</span> </label>
                                <input type="text" name="title" id="title" value="<?php echo set_value('title'); ?>" class="input w-full border col-span-4 required" placeholder="John Legend" required>
                            </div>
                            <div class="input-form mt-3">
                                <label for="image" class="flex flex-col sm:flex-row"> Image <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600">*</span> </label>
                                <!-- <div data-single="true" action="<?php //echo base_url(); ?>uploads" class="dropzone">
                                    <div class="fallback">
                                        <input type="file" name="image" id="image" value="<?php //echo set_value('image'); ?>" class="input w-full border mt-2" required>
                                    </div>
                                    <div class="dz-message" data-dz-message>
                                        <div class="text-lg font-medium">Drop files here or click to upload.</div>
                                        <div class="text-slate-500">Select <span class="font-medium">file</span> to upload.
                                        </div>
                                    </div>
                                </div> -->
                                <input type="file" name="image" id="image" value="<?php echo set_value('image'); ?>" class="input w-full border mt-2" required>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-2">
                            <div class="input-form mt-3">
                                <label for="ingredients" class="flex flex-col sm:flex-row"> Ingredients <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600">*</span> </label>
                                <textarea class="input w-full border mt-2" id="ingredients" value="<?php echo set_value('ingredients'); ?>" name="ingredients" placeholder="Type your text here" required></textarea>
                            </div>
                            <div class="input-form mt-3">
                                <label for="preparations" class="flex flex-col sm:flex-row"> Preparation <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600">*</span> </label>
                                <textarea class="input w-full border mt-2" id="preparations" value="<?php echo set_value('preparations'); ?>" name="preparations" placeholder="Type your text here" required></textarea>
                            </div>
                        </div>
                        <div class="grid grid-cols-0 gap-2">
                            <div class="input-form mt-3">
                                <label for="pro_tip" class="flex flex-col sm:flex-row"> Pro Tip <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600">*</span> </label>
                                <input type="text" name="pro_tip" id="pro_tip" value="<?php echo set_value('pro_tip'); ?>" class="input w-full border mt-2" required>
                            </div>
                        </div>
                        <div class="grid grid-cols-4 gap-2">
                            <div class="input-form mt-3">
                                <label for="total_time" class="flex flex-col sm:flex-row"> Total Time <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600">*</span> </label>
                                <input type="text" name="total_time" id="total_time" value="<?php echo set_value('total_time'); ?>" class="input w-full border mt-2" required>
                            </div>
                            <div class="input-form mt-3">
                                <label for="difficulty" class="flex flex-col sm:flex-row"> Difficulty <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600">*</span> </label>
                                <input type="text" name="difficulty" id="difficulty" value="<?php echo set_value('difficulty'); ?>" class="input w-full border mt-2" required>
                            </div>
                            <div class="input-form mt-3">
                                <label for="makes" class="flex flex-col sm:flex-row"> Makes <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600">*</span> </label>
                                <input type="text" name="makes" id="makes" value="<?php echo set_value('makes'); ?>" class="input w-full border mt-2" required>
                            </div>
                            <div class="input-form mt-3">
                                <label for="cuisine" class="flex flex-col sm:flex-row"> Cuisine <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600">*</span> </label>
                                <input type="text" name="cuisine" id="cuisine" value="<?php echo set_value('cuisine'); ?>" class="input w-full border mt-2" required>
                            </div>
                        </div>
                        <div class="grid grid-cols-4 gap-2">
                            <div class="input-form mt-3">
                                <label for="calories" class="flex flex-col sm:flex-row"> Calories <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600">*</span> </label>
                                <input type="text" name="calories" id="calories" value="<?php echo set_value('calories'); ?>" class="input w-full border mt-2" required>
                            </div>
                            <div class="input-form mt-3">
                                <label for="fats" class="flex flex-col sm:flex-row"> Fats <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600">*</span> </label>
                                <input type="text" name="fats" id="fats" value="<?php echo set_value('fats'); ?>" class="input w-full border mt-2" required>
                            </div>
                            <div class="input-form mt-3">
                                <label for="carb" class="flex flex-col sm:flex-row"> Carb <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600">*</span> </label>
                                <input type="text" name="carb" id="carb" value="<?php echo set_value('carb'); ?>" class="input w-full border mt-2" required>
                            </div>
                            <div class="input-form mt-3">
                                <label for="protein" class="flex flex-col sm:flex-row"> Protein <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600">*</span> </label>
                                <input type="text" name="protein" id="protein" value="<?php echo set_value('protein'); ?>" class="input w-full border mt-2" required>
                            </div>
                        </div>
                        <div class="grid grid-cols-4 gap-2">
                            <div class="input-form mt-3">
                                <label for="preferenceID" class="flex flex-col sm:flex-row"> Preference <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600">*</span> </label>
                                <?php if(!empty($preferences)){ foreach($preferences as $preference){ ?>
                                <div class="flex items-center text-gray-700 dark:text-gray-500 mt-2">
                                    <input type="radio" name="preferenceID" id="preferenceID" class="input border mr-2" value="<?=$preference->preference_id?>" required> 
                                    <label class="cursor-pointer select-none" for="horizontal-radio-chris-evans"><?=$preference->preference_title?></label> 
                                </div>
                                <?php } } ?>
                            </div>
                            <div class="input-form mt-3">
                                <label for="recipe_typeID" class="flex flex-col sm:flex-row"> Recipe Type <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600">*</span> </label>
                                <?php if(!empty($recipe_types)){ foreach($recipe_types as $recipe_type){ ?>
                                <div class="flex items-center text-gray-700 dark:text-gray-500 mt-2">
                                    <input type="radio" name="recipe_typeID" id="recipe_typeID" class="input border mr-2" value="<?=$recipe_type->recipe_type_id?>" required> 
                                    <label class="cursor-pointer select-none" for="horizontal-radio-chris-evans"><?=$recipe_type->recipe_type_title?></label> 
                                </div>
                                <?php } } ?>
                            </div>
                        <!-- </div>
                        <div class="grid grid-cols-2 gap-2"> -->
                            <div class="input-form mt-3">
                                <label for="macroID" class="flex flex-col sm:flex-row"> Macro Preference <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600"></span> </label>
                                <?php if(!empty($macro_preferences)){ foreach($macro_preferences as $macro_preference){ ?>
                                <div class="flex items-center text-gray-700 dark:text-gray-500 mt-2"> 
                                    <input type="checkbox" class="input border mr-2" name="macroID[]" id="macroID" value="<?=$macro_preference->macro_preference_id?>"> 
                                    <label class="cursor-pointer select-none" for="vertical-checkbox-chris-evans"><?=$macro_preference->macro_preference_title?></label> 
                                </div>
                                <?php } } ?>
                            </div>
                            <div class="input-form mt-3">
                                <label for="simplicityID" class="flex flex-col sm:flex-row"> Simplicity Factor <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600"></span> </label>
                                <?php if(!empty($simplicity_factors)){ foreach($simplicity_factors as $simplicity_factor){ ?>
                                <div class="flex items-center text-gray-700 dark:text-gray-500 mt-2"> 
                                    <input type="checkbox" class="input border mr-2" name="simplicityID[]" id="simplicityID" value="<?=$simplicity_factor->simplicity_factor_id?>"> 
                                    <label class="cursor-pointer select-none" for="vertical-checkbox-chris-evans"><?=$simplicity_factor->simplicity_factor_title?></label> 
                                </div>
                                <?php } } ?>
                            </div>
                        </div>
                        <div class="input-form mt-3">
                            <input type="submit" class="button w-24 mr-1 mb-2 bg-theme-12 text-white mt-5" value="Submit" />
                            <button type="button" class="button w-24 mr-1 mb-2 bg-gray-200 text-gray-600 text-white mt-5" onclick="goBack()">Back</button>
                            <button type="reset" class="button w-24 mr-1 mb-2 bg-theme-6 text-white mt-5" value="">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- END: Form Validation -->
    </div>
</div>
<script src="<?php echo assets_url(); ?>assets/js/jQuery-2.1.4.min.js"></script>
<!-- <script src="<?php //echo assets_url(); ?>assets/js/fitness_recipe.js" type="text/javascript"></script> -->
<script type = "text/javascript">
    $(document).ready(function() {
        $('#ingredients, #preparations').summernote({
            tooltip: false,
            height: 300,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    });
</script>
<script type="text/javascript">
    function goBack()
    {
        window.history.back();

    }
</script>
