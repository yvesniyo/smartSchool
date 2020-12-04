import AppForm from '../app-components/Form/AppForm';

Vue.component('student-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                first_name:  '' ,
                last_name:  '' ,
                nfc:  '' ,
                parent_phone_number:  '' ,
                is_active:  false ,
                
            }
        }
    }

});