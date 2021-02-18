<template>
    <form
        class="my-4"
        @submit.prevent="login"
    >
        <div class="form-group">
            <label>Masukkan Token 12 Digit</label>
            <bsb-input-errors type="text" v-model="form.data.token" :errors="form.errors.token" />
        </div>
        <bsb-button-spinner class="mt-4" color="primary" type="submit" :block="true" :loading="state.form.loading">
            Kirim Token
        </bsb-button-spinner>
    </form>
</template>

<script>
import mixins from '../../../mixins'

export default {
    mixins: [mixins],
    data() {
        return {
            form: {
                data: { token: '' },
                errors: { token: [] },
            },
            state: {
                form: {
                    loading: false,
                },
            },
        }
    },
    methods: {
        login() {
            this.initiateForm()
            axios.get('/ajax/utils/csrf_cookie')
                .then(res => {
                    this.submitForm('/ajax/logs/authentication_log/token', 'post', {
                        resolve: true,
                        reject: false
                    }).then(() => this.$router.push({ name: 'dashboard' }))
                })
                .catch(err => this.handleResultError(err))
                .finally(() => this.stopFormLoading())
        }
    }
}
</script>