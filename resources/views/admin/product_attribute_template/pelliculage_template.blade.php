<template id="pelliculage-list">
    <table class="table table-hover">
        <tr v-for="pelliculage in pelliculages">
            <td>@{{pelliculage.pelliculage}}</td>
            <td>
                <button class="btn btn-danger" @click="delPelliculage(pelliculage)">删除</button>
                <button class="btn btn-default" @click="editPelliculage">编辑</button>
            </td>
        </tr>
    </table>
</template>