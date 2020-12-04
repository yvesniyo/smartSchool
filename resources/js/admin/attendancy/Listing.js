import AppListing from '../app-components/Listing/AppListing';

Vue.component('attendancy-listing', {
    mixins: [AppListing],
    data() {
        return {
            showStudentsFilter: false,
            studentsMultiselect: {},

            filters: {
                students: [],
            },
        }
    },

    watch: {
        showStudentsFilter: function (newVal, oldVal) {
            this.studentsMultiselect = [];
        },
        studentsMultiselect: function (newVal, oldVal) {
            this.filters.students = newVal.map(function (object) { return object['key']; });
            this.filter('students', this.filters.students);
        }
    }
});