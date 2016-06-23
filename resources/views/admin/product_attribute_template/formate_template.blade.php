<template id="format-list">
    <table class="table table-hover">
        <tr v-for="format in formats">
            <td>@{{format.format}}</td>
            <td>
                <button class="btn btn-danger" @click="delFormat(format)">删除</button>
                <button class="btn btn-default" @click="editFormat">编辑</button>
            </td>
        </tr>
    </table>
</template>
