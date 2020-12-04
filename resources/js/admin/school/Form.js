import AppForm from '../app-components/Form/AppForm';

Vue.component('school-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                name:  '' ,
                email:  '' ,
                phone:  '' ,
                location:  '' ,
                enabled:  false ,
                
            }
        }
    }

});