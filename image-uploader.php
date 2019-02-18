<?php
require_once("./DB.php");
require_once("./config.php");
ini_set('file_uploads', 'on');

$db = new DB("mysql", $servername, $username, $password, $dbname);
$db->open();
$original_data = $db->fetchTable("migrated_data");
$message = "";
if (isset($_POST["submit"])) {
    $message = saveUpLoadFile($db);
    $original_data = $db->fetchTable("migrated_data");
}
/// save the file upload into target path
function saveUpLoadFile($db)
{

    $target_dir = "./media/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

            if (isset($_POST["product_id"])) {
                $db->updateProductImageUrl($_POST['product_id'], $target_file);
            }
            return ["success","The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded."];
        }
        else {
            return ["error","Sorry, there was an error uploading your file."];
        }
    }
    else {
        return ["error","File is not an image."];
    }

}

?>
<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/vuetify/dist/vuetify.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
    <style>
        .highlight{
            background-color: lightpink;
        }
    </style>
</head>
<body>

<div id="app" message='<?=json_encode($message)?>' originalData='<?= json_encode($original_data, JSON_HEX_APOS) ?>'/>

<v-app>
    <v-snackbar v-model="snack" :timeout="messageTimeOut" :color="snackColor">
        {{ snackText }}
        <v-btn flat @click="snack = false">Close</v-btn>
    </v-snackbar>

    <v-layout row>
        <v-flex xs12 sm6 offset-sm3>
            <v-card>
                <v-toolbar color="teal" dark>
                    <v-toolbar-side-icon></v-toolbar-side-icon>

                    <v-toolbar-title class="text-xs-center">Product Image Uploader</v-toolbar-title>

                    <v-spacer></v-spacer>

                </v-toolbar>

                <v-list>

                    <v-list-tile
                            v-for="item in originalData"
                            :key="item.product_id"
                            avatar
                            @click=""
                            :class="select==item.product_id ? 'highlight':''"
                    >

                        <v-list-tile-avatar>
                            <img :src="getImage(item.image_url)">
                        </v-list-tile-avatar>

                        <v-list-tile-content>
                            {{item.name}}
                            <v-list-tile-sub-title v-html="`${item.product_id} ${item.sku}`"></v-list-tile-sub-title>

                        </v-list-tile-content>

                        <v-list-tile-action>
                            <form method="post" enctype="multipart/form-data" action="image-uploader.php">
                                <input @click="select=item.product_id" type="file" name="fileToUpload">
                                <input type="hidden" name="product_id" :value="item.product_id">
                                <v-btn fab small color="pink" :disabled="select!=item.product_id">
                                    <v-icon dark>save</v-icon>
                                    <input type="submit" name="submit" value="Save">
                                </v-btn>
                            </form>
                        </v-list-tile-action>


                    </v-list-tile>
                </v-list>

            </v-card>
        </v-flex>
    </v-layout>
</v-app>
</div>

<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vuetify/dist/vuetify.js"></script>
<script>
    new Vue({
            el: '#app',
            data: {
                select: '',
                defaultImage: '/media/default.jpeg',
                originalData: [],
                snackText: "",
                snack: false,
                snackColor: "",
                messageTimeOut: 3000
            },
            methods: {
                getImage(image) {
                    if (image == '') {
                        image = this.defaultImage;
                    }
                    return image;
                },
                snackMessage(color, message) {
                    if(message != undefined) {
                        this.snack = true;
                        this.snackColor = color; //"info"; "error"; "success";
                        this.snackText = message; //"Dialog opened";
                    }
                },
            },
            mounted: function () {
                this.originalData = JSON.parse(this.$el.attributes.originaldata.value);
                let [color,message] = JSON.parse(this.$el.attributes.message.value);
                this.snackMessage(color,message);
            }
        }
    )
</script>

</body>
</html>