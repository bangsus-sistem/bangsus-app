
export default function data() {
    return {
        query: {
            page: 0,
            count: 0,
            sort: '',
            order: '',
        },
        result: {
            items: null,
            meta: {
                'first_item': 1,
                'last_item': 12,
                'last_page': 1,
                'total': 12000,
            }
        },
        form: {
            message: null,
        },
        state: {
            page: {
                loading: false,
                error: false,
                message: null,
            },
            result: { loading: false },
            form: { loading: false },
        },
        meta: {
            counts: [10, 25, 50, 100]
        }
    }
}
