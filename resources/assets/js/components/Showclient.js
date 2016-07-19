/**
 * Created by YANTAO on 16/7/19.
 */

export default{
    template: `
            <table class="table table-hover">
                <tr >
                    <td v-for="thead in theads" track-by="$index">{{thead}}</td>
                </tr>
                <tr>
                    <td>1</td>
                </tr>
            </table>
    `,
    props: ['theads', 'lists']
}