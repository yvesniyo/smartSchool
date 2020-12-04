import AppForm from '../app-components/Form/AppForm';

Vue.component('device-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                uuid:  '' ,
                version:  '' ,
                admin_user_id:  '' ,
                enabled:  false ,
                school_id:  '' ,
                
            }
        }
    }

});