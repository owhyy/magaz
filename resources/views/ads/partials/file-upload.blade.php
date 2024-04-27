<div x-data="{ thumbnail: null }">
    <br/>
    <input x-ref="fileUpload" style="display: none" type="file" id="files"
           @change="thumbnail = URL.createObjectURL($event.target.files[0]);">
    <input style="width: 20%" type="button" value="Browse..." @click="$refs.fileUpload.click()" />
    </br>
    <img x-show="thumbnail" width="200" height="150" :src="thumbnail" />
</div>
