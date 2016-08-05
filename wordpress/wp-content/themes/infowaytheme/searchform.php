<div class="side-search">
    <form role="search" method="get" class="searchform" action="<?php echo home_url('/'); ?>">
        <div>
            <input onfocus="if (this.value == 'Search') {
                        this.value = '';
                    }" onblur="if (this.value == '') {
                                this.value = '<?php _e('Search', 'infoway'); ?>;
                            }"  value="<?php _e('Search', 'infoway'); ?>" type="text" name="s" id="s" />
            <input type="submit" value="" name="submit"/>
        </div>
    </form>
</div>
<div class="clear"></div>
