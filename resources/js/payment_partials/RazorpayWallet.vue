<template lang="html">
    <div>
        <button
            @click="$emit('pay-now')"
            type="button"
            class="btn btn-primary w-100"
            :disabled="is_disable"
        >
            {{ lang.pay_now }}</button
        >
    </div>
</template>

<script>
export default {

    props: ['amount'],

    data(){
        return {
            is_disable: false,
        }
    },
};
</script>

