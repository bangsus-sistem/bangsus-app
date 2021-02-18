<template>
    <div class="text-danger mt-1">
        <ul>
            <li v-for="(error, i) in errors" :key="i">
                {{ error }}
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    props: {
        errors: {
            type: Array,
            default: () => {
                return []
            }
        }
    }
}
</script>