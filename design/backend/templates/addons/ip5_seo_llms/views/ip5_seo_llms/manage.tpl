{script src="js/tygh/tabs.js"}

{capture name="mainbox"}

<div class="items-container" id="manage_llms">

<form id="llms_form" action="{""|fn_url}" method="post" name="llms_update_form" class="form-horizontal form-edit cm-ajax cm-disable-empty-files">
    <input type="hidden" name="result_ids" value="manage_llms" />

    <div id="manage_llms_content">

    {if fn_allowed_for("ULTIMATE")}
    <div class="control-group disable-overlay-wrap">
        {if !$runtime.company_id && !$runtime.simple_ultimate}
            <div class="disable-overlay"></div>
        {/if}
        <label for="elm_llms_edit" class="control-label">{__("edit_file")}<p>{__("llms")}:</p></label>

        <div class="controls">
            <textarea id="elm_llms_edit" name="llms_data[content]" cols="55" rows="12" class="span12">{$llms}</textarea>
            {if !$runtime.company_id}
                <div class="right">
                    {include file="buttons/update_for_all.tpl"
                        display=true
                        object_id="llms"
                        name="llms_data[update_content]"
                        component="llms.llms_uploader"
                    }
                </div>
            {/if}
        </div>
    </div>
    {else}
    <div class="control-group">
        <label for="elm_llms_edit" class="control-label">{__("edit_llms")}:</label>
        <div class="controls">
            <textarea id="elm_llms_edit" name="llms_data[content]" cols="55" rows="12" class="span12">{$llms}</textarea>
        </div>
    </div>
    {/if}

    <!--manage_llms_content--></div>

</form>

</div>

{capture name="buttons"}
    {include file="buttons/save.tpl" but_name="dispatch[ip5_seo_llms.update]" but_role="submit-link" but_target_form="llms_update_form"}
{/capture}

{/capture}

{include file="common/mainbox.tpl"
    title=__("llms_title")
    content=$smarty.capture.mainbox
    buttons=$smarty.capture.buttons
    select_storefront=true
    show_all_storefront=!("MULTIVENDOR"|fn_allowed_for)
}
