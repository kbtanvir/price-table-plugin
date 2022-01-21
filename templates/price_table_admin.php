<style>
    .table>:not(caption)>*>* {
        border-bottom-width: 0px;
    }
</style>



<div class="tixioPTwrapper" id="tixioPTwrapper">
    <div class="container">
        <div class="flex-row center" style='margin-bottom: 30px;'>
            <input @click.prevent='updatePriceTable' type="submit" value="Save" class="btn btn-primary submit" />
        </div>

        <div class="flex-row mb-5">
            <div class="flex-col g-3">
                <input required v-model='lite_pack.button_text' type="text" class="form-control" />
                <input required v-model='lite_pack.button_url' type="text" class="form-control" />
            </div>
            <div class="flex-col g-3">
                <input required v-model='team_pack.button_text' type="text" class="form-control" />
                <input required v-model='team_pack.button_url' type="text" class="form-control" />
            </div>
            <div class="flex-col g-3">
                <input required v-model='enterprise_pack.button_text' type="text" class="form-control" />
                <input required v-model='enterprise_pack.button_url' type="text" class="form-control" />
            </div>
        </div>
        <table class="table">


            <thead>
                <tr>
                    <th scope="col">Feature</th>
                    <th scope="col">Lite</th>
                    <th scope="col">Team</th>
                    <th scope="col">Enterprise</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in priceTableData" style='border:none;'>

                    <th scope="row">
                        <input required v-model='item.name' title="features" type="text" class="form-control" />
                    </th>

                    <td v-if='!item.header'>
                        <input required v-model='item.lite' title="Lite package" type="text" class="form-control" />
                    </td>
                    <td v-if='!item.header'>
                        <input required v-model='item.team' title="Team package" type="text" class="form-control" />
                    </td>
                    <td v-if='!item.header'>
                        <input required v-model='item.enterprise' title="Enterprise" type="text" class="form-control" />
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="flex-row center" style='margin-bottom: 30px;'>
            <input @click.prevent='updatePriceTable' type="submit" value="Save" class="btn btn-primary submit" />
        </div>
    </div>
</div>