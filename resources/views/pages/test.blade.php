<!DOCTYPE html>
<html>
<body>
<div id="app">
    <ul>
        <todo-item></todo-item>
    </ul>
</div>

<script src="https://cdn.bootcss.com/vue/2.4.2/vue.min.js"></script>
<script>
    Vue.component('todo-item', {
        template: '<li>This is a todo</li>'
    })
</script>
</body>
</html>