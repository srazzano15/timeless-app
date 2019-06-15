<template>
    <div class="row">
        <div class="input-field col s12">
            <input :id="fieldId" :type="fieldType" 
            :name="fieldName">

            <label :for="labelFor" class=""><slot name="field-label"></slot></label>
            <slot></slot>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        'fieldName': String,
        'fieldId': String,
        'fieldType': String,
        'labelFor': String,
    }
}
</script>

<style>

</style>
