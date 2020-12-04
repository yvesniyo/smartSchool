import AppForm from '../app-components/Form/AppForm';

Vue.component('attendancy-form', {
    mixins: [AppForm],
    props: [
        'students'
    ],
    data: function () {
        return {
            form: {
                notified: true,
                student: '',
            }
        }
    }

});