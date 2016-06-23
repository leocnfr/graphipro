<template id="papier-list">
    <table class="table table-hover">
        <tr v-for="papier in papiers">
            <td>@{{papier.papier}}</td>
            <td>
                <button class="btn btn-danger" @click="delPapier(papier)">删除</button>
                <button class="btn btn-default" @click="editPapier">编辑</button>
            </td>
        </tr>
    </table>
</template>