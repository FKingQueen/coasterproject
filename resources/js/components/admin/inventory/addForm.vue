<template>
    <div class="p-2 ">
        <div class="m-5 bg-white shadow-inner shadow-lg rounded px-20 py-5">
            <Breadcrumb separator=">">
                <BreadcrumbItem to="/admin/inventoryPlatform">Inventory</BreadcrumbItem>
                <BreadcrumbItem>New Inventory Form</BreadcrumbItem>
            </Breadcrumb>
            <a-button @click="this.$router.push('/admin/inventoryPlatform')" class="my-3">Back</a-button>
            <Form ref="formValidate" :model="formValidate" :rules="ruleValidate" label-position="top" class="px-10">
                <div class="w-full border flex justify-center bg-[#abdcff]/80 py-1 mb-2">
                    <p class="">LOCATION</p>
                </div>
                <FormItem label="Province" prop="province" filterable>
                    <Select v-model="formValidate.province" placeholder="Select Province" :on-change="provinceChange()">
                        <Option v-for="item in provinceList" :value="item.value" :key="item.value">{{ item.label }}</Option>
                    </Select>
                </FormItem>
                <FormItem label="Municipality" prop="municipality">
                    <!-- <Input v-model="formValidate.municipality" placeholder="Input Municipality"></Input> -->
                    <Select v-model="formValidate.municipality" placeholder="Select Municipality">
                        <Option v-for="item in municipalityList" :value="item.value" :key="item.value">{{ item.label }}
                        </Option>
                    </Select>
                </FormItem>
                <FormItem label="Barangay" prop="barangay">
                    <Input v-model="formValidate.barangay" placeholder="Input Barangay"></Input>
                </FormItem>
                <FormItem label="Latitude" prop="latitude">
                    <Input v-model="formValidate.latitude" placeholder="Input Latitude"></Input>
                </FormItem>
                <FormItem label="Longitude" prop="longitude">
                    <Input v-model="formValidate.longitude" placeholder="Input Longitude"></Input>
                </FormItem>
                <div class="w-full border flex justify-center bg-[#abdcff]/80 py-1 mb-2">
                    <p class="">DATA INPUTS</p>
                </div>
                <FormItem label="Structure Material" prop="structureMaterialValidate">
                    <Select v-model="formValidate.structureMaterial" multiple placeholder="Select Structure Material">
                        <Option v-for="item in structureMaterialList" :value="item.value" :key="item.value">{{ item.label }}
                        </Option>
                    </Select>
                </FormItem>
                <FormItem label="Coastal Hazard" prop="coastalHazardValidate">
                    <Select v-model="formValidate.coastalHazard" multiple placeholder="Select Coastal Hazard">
                        <Option v-for="item in coastalHazardList" :value="item.value" :key="item.value">{{ item.label }}
                        </Option>
                    </Select>
                </FormItem>
                <FormItem label="Shoreline" prop="shorelineValidate">
                    <Select v-model="formValidate.shoreline" multiple placeholder="Select ShoreLine">
                        <Option v-for="item in shorelineList" :value="item.value" :key="item.value">{{ item.label }}
                        </Option>
                    </Select>
                </FormItem>
                <FormItem label="Coastal Morphology" prop="morphology">
                    <Select v-model="formValidate.morphology" placeholder="Select Coastal Morphology">
                        <Option v-for="item in morphologyList" :value="item.value" :key="item.value">{{ item.label }}
                        </Option>
                    </Select>
                </FormItem>
                <FormItem label="Type of Coastal Structure" prop="typeStructureValidate">
                    <Select v-model="formValidate.typeStructure" multiple placeholder="Select Type of Coastal Structure">
                        <Option v-for="item in coastalStructureList" :value="item.value" :key="item.value">{{ item.label }}
                        </Option>
                    </Select>
                </FormItem>
                <FormItem label="Type of Wave Structure" prop="wavesStructure">
                    <Select v-model="formValidate.wavesStructure" placeholder="Select Waves Structure">
                        <Option v-for="item in waveStructureList" :value="item.value" :key="item.value">{{ item.label }}
                        </Option>
                    </Select>
                </FormItem>
                <FormItem label="Protection Toe" prop="protectionToe">
                    <Select v-model="formValidate.protectionToe" placeholder="Select Protection Toe">
                        <Option v-for="item in protectionToeList" :value="item.value" :key="item.value">{{ item.label }}
                        </Option>
                    </Select>
                </FormItem>
                <FormItem label="Armor Units" prop="armorUnits">
                    <Select v-model="formValidate.armorUnits" placeholder="Select Armor Units">
                        <Option v-for="item in armorUnitsList" :value="item.value" :key="item.value">{{ item.label }}
                        </Option>
                    </Select>
                </FormItem>
                <FormItem label="Height Structure" prop="heightStructure">
                    <Input v-model="formValidate.heightStructure" placeholder="Input Height Structure"></Input>
                </FormItem>
                <FormItem label="Length Structure" prop="lengthStructure">
                    <Input v-model="formValidate.lengthStructure" placeholder="Input Length Structure"></Input>
                </FormItem>
                <div class="w-full border flex justify-center bg-[#abdcff]/80 py-1 mb-2">
                    <p class="">TYPOLOGY</p>
                </div>
                <FormItem label="Landwards" prop="landwardsTypology">
                    <Select v-model="formValidate.landwardsTypology" placeholder="Select Landwards Typology">
                        <Option v-for="item in landwardsTypologyList" :value="item.value" :key="item.value">{{ item.label }}
                        </Option>
                    </Select>
                </FormItem>
                <FormItem label="Shoreline" prop="shorelineTypology">
                    <Select v-model="formValidate.shorelineTypology" placeholder="Select Shoreline Typology">
                        <Option v-for="item in shorelineTypologyList" :value="item.value" :key="item.value">{{ item.label }}
                        </Option>
                    </Select>
                </FormItem>
                <FormItem label="Nearshore" prop="nearshoreTypology">
                    <Select v-model="formValidate.nearshoreTypology" placeholder="Select Nearshore Typology">
                        <Option v-for="item in nearshoreTypologyList" :value="item.value" :key="item.value">{{ item.label }}
                        </Option>
                    </Select>
                </FormItem>
                <div class="w-full border flex justify-center bg-[#abdcff]/80 py-1 mb-2">
                    <p class="">CONTENT</p>
                </div>
                <FormItem label="Image (atleast 1)" prop="image">
                    <Upload type="drag" ref="uploads"
                        :headers="{ 'x-csrf-token': token, 'X-Requested-With': 'XMLHttpRequest' }"
                        :on-success="handleSuccess" :on-error="handleError" :format="['jpg', 'jpeg', 'png']"
                        :on-format-error="handleFormatError" action="/api/admin/uploadInventory">
                        <div style="padding: 3px 0">
                            <Icon type="ios-cloud-upload" size="52" style="color: #3399ff"></Icon>
                            <p>Click or drag files here to upload</p>
                        </div>
                    </Upload>
                    <div v-if="formValidate.image" class="demo-upload-list">
                        <Image :src="`/inventory/low/${formValidate.image}`" fit="cover" width="100%" height="100%" />
                        <div class="demo-upload-list-cover">
                            <Icon type="ios-eye-outline" @click="handleView(item.name)"></Icon>
                            <Icon type="ios-trash-outline" @click="deleteImage()"></Icon>
                        </div>
                    </div>
                </FormItem>
                <FormItem label="Description" prop="description">
                    <ckeditor :editor="editor" v-model="formValidate.description" :config="editorConfig"
                        placeholder="Write Description"></ckeditor>
                </FormItem>

                <div class="flex justify-end">
                    <a-button key="submit" type="primary" @click="handleSubmit('formValidate')">Submit</a-button>
                </div>
            </Form>
        </div>
    </div>
</template>

<script>
import { defineComponent, ref, watch } from 'vue';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import { notification } from 'ant-design-vue';
export default defineComponent({
    data() {
        return {
            editor: ClassicEditor,
            editorConfig: {
                toolbar: {
                    items: [
                        'undo', 'redo',
                        '|', 'heading',
                        '|', 'bold', 'italic',
                        '|', 'link', 'blockQuote',
                        '|', 'bulletedList', 'numberedList', 'outdent', 'indent'
                    ]
                }
            },
            token: '',
            provinceList: [
                {
                    value: 'Ilocos Norte',
                    label: 'Ilocos Norte'
                },
                {
                    value: 'Ilocos Sur',
                    label: 'Ilocos Sur'
                },
                {
                    value: 'La Union',
                    label: 'La Union'
                },
                {
                    value: 'Pangasinan',
                    label: 'Pangasinan'
                },
            ],
            municipalityList: "",
            ilocosNorteList: [
                {
                    value: 'Bangui',
                    label: 'Bangui'
                },
                {
                    value: 'Burgos',
                    label: 'Burgos'
                },
                {
                    value: 'Currimao',
                    label: 'Currimao'
                },
                {
                    value: 'Pagudpud',
                    label: 'Pagudpud'
                },
                {
                    value: 'Pasuquin',
                    label: 'Pasuquin'
                },
            ],
            ilocosSurList: [
                {
                    value: 'Cabugao',
                    label: 'Cabugao'
                },
                {
                    value: 'Candon',
                    label: 'Candon'
                },
                {
                    value: 'Caoayan',
                    label: 'Caoayan'
                },
                {
                    value: 'Narvacan',
                    label: 'Narvacan'
                },
                {
                    value: 'San Esteban',
                    label: 'San Esteban'
                },
                {
                    value: 'Santiago',
                    label: 'Santiago'
                },
                {
                    value: 'Santa',
                    label: 'Santa'
                },
                {
                    value: 'San Juan',
                    label: 'San Juan'
                },
                {
                    value: 'Sinait',
                    label: 'Sinait'
                },
                {
                    value: 'Sta. Catalina',
                    label: 'Sta. Catalina'
                },
                {
                    value: 'Sta. Maria',
                    label: 'Sta. Maria'
                },
                {
                    value: 'Vigan',
                    label: 'Vigan'
                },
            ],
            laUnionList: [
                {
                    value: 'Agoo',
                    label: 'Agoo'
                },
                {
                    value: 'Aringay',
                    label: 'Aringay'
                },
                {
                    value: 'Bacnotan',
                    label: 'Bacnotan'
                },
                {
                    value: 'Balaoan',
                    label: 'Balaoan'
                },
                {
                    value: 'Bauang',
                    label: 'Bauang'
                },
                {
                    value: 'Caba',
                    label: 'Caba'
                },
                {
                    value: 'Luna',
                    label: 'Luna'
                },
                {
                    value: 'San Fernando',
                    label: 'San Fernando'
                },
                {
                    value: 'San Juan',
                    label: 'San Juan'
                },
                {
                    value: 'Sto. Tomas',
                    label: 'Sto. Tomas'
                },
                {
                    value: 'San Juan',
                    label: 'San Juan'
                },
            ],
            pangasinanList: [
                {
                    value: 'Alaminos',
                    label: 'Alaminos'
                },
                {
                    value: 'Anda',
                    label: 'Anda'
                },
                {
                    value: 'Binmaley',
                    label: 'Binmaley'
                },
                {
                    value: 'Bolinao',
                    label: 'Bolinao'
                },
                {
                    value: 'Dagupan',
                    label: 'Dagupan'
                },
                {
                    value: 'Dasol',
                    label: 'Dasol'
                },
                {
                    value: 'Infanta',
                    label: 'Infanta'
                },
                {
                    value: 'Labrador',
                    label: 'Labrador'
                },
                {
                    value: 'Lingayen',
                    label: 'Lingayen'
                },
                {
                    value: 'San Fabian',
                    label: 'San Fabian'
                },
                {
                    value: 'Sual',
                    label: 'Sual'
                }
            ],
            structureMaterialList: [
                {
                    value: 'Wood',
                    label: 'Wood'
                },
                {
                    value: 'Concrete',
                    label: 'Concrete'
                },
                {
                    value: 'Reinforced Concrete',
                    label: 'Reinforced Concrete'
                },
                {
                    value: 'Stone Masonry',
                    label: 'Stone Masonry'
                },
                {
                    value: 'Calcified Rocks',
                    label: 'Calcified Rocks'
                },
                {
                    value: 'Wood & Concrete',
                    label: 'Wood & Concrete'
                },
                {
                    value: 'Stone & Reinforced Concrete',
                    label: 'Stone & Reinforced Concrete'
                },
            ],
            heightStructureList: [
                {
                    value: '< 1 meter',
                    label: '< 1 meter'
                },
                {
                    value: '1 meter - 3 meter',
                    label: '1 meter - 3 meter'
                },
                {
                    value: '3 meter - 5 meter',
                    label: '3 meter - 5 meter'
                },
                {
                    value: '5 meter - 7 meter',
                    label: '5 meter - 7 meter'
                },
                {
                    value: '7 meter - 9 meter',
                    label: '7 meter - 9 meter'
                },
                {
                    value: '9 meter - 10 meter',
                    label: '9 meter - 10 meter'
                },
                {
                    value: '> 10 meter',
                    label: '> 10 meter'
                },
                {
                    value: 'Not Available',
                    label: 'Not Available'
                },
            ],
            lengthStructureList: [
                {
                    value: '< 0.5 kilometer',
                    label: '< 0.5 kilometer'
                },
                {
                    value: '0.5 kilometer - 1.0 kilometer',
                    label: '0.5 kilometer - 1.0 kilometer'
                },
                {
                    value: '1.0 - 2.0 kilometer',
                    label: '1.0 - 2.0 kilometer'
                },
                {
                    value: '2.0 kilometer - 3.0 kilometer',
                    label: '2.0 kilometer - 3.0 kilometer'
                },
                {
                    value: '3.0 kilometer - 4.0 kilometer',
                    label: '3.0 kilometer - 4.0 kilometer'
                },
                {
                    value: '4.0 kilometer - 5.0  kilometer',
                    label: '4.0 kilometer - 5.0  kilometer'
                },
                {
                    value: '> 5.0 kilometer',
                    label: '> 5.0 kilometer'
                },
            ],
            coastalHazardList: [
                {
                    value: 'Storm Surge (SS)',
                    label: 'Storm Surge (SS)'
                },
                {
                    value: 'Tsunami (T)',
                    label: 'Tsunami (T)'
                },
                {
                    value: 'Coastal Erosion (CE)',
                    label: 'Coastal Erosion (CE)'
                },
                {
                    value: 'Coastal Flooding (CF)',
                    label: 'Coastal Flooding (CF)'
                },
                {
                    value: 'Liquefaction (L)',
                    label: 'Liquefaction (L)'
                },
            ],
            protectionToeList: [
                {
                    value: 'Yes',
                    label: 'Yes'
                },
                {
                    value: 'No',
                    label: 'No'
                },
                {
                    value: 'Undetemined',
                    label: 'Undetemined'
                },
                {
                    value: 'Not Available',
                    label: 'Not Available'
                },
            ],
            landwardsTypologyList: [
                {
                    value: 'Agricultural lands',
                    label: 'Agricultural lands'
                },
                {
                    value: 'Forested lands',
                    label: 'Forested lands'
                },
                {
                    value: 'Urban areas',
                    label: 'Urban areas'
                },
                {
                    value: 'Mining areas',
                    label: 'Mining areas'
                },
                {
                    value: 'Natural parks and reserves',
                    label: 'Natural parks and reserves'
                },
                {
                    value: 'Not Available',
                    label: 'Not Available'
                },
            ],
            shorelineTypologyList: [
                {
                    value: 'Beach (Sandy/Cobble)',
                    label: 'Beach (Sandy/Cobble)'
                },
                {
                    value: 'Rocky Shore',
                    label: 'Rocky Shore'
                },
                {
                    value: 'Mangrove/Swamp',
                    label: 'Mangrove/Swamp'
                },
                {
                    value: 'Rock or Uplifted Coral Reefs',
                    label: 'Rock or Uplifted Coral Reefs'
                },
                {
                    value: 'Seagrass Beds',
                    label: 'Seagrass Beds'
                },
                {
                    value: 'Not Available',
                    label: 'Not Available'
                },
            ],
            nearshoreTypologyList: [
                {
                    value: 'Open Coast',
                    label: 'Open Coast'
                },
                {
                    value: 'Shallow Enclosed Water',
                    label: 'Shallow Enclosed Water'
                },
                {
                    value: 'Not Available',
                    label: 'Not Available'
                },
            ],
            armorUnitsList: [
                {
                    value: 'Yes',
                    label: 'Yes'
                },
                {
                    value: 'No',
                    label: 'No'
                }
            ],
            morphologyList: [
                {
                    value: 'Coral Reef',
                    label: 'Coral Reef'
                },
                {
                    value: 'Sandy Coast',
                    label: 'Sandy Coast'
                },
                {
                    value: 'Rocky Coast',
                    label: 'Rocky Coast'
                },
                {
                    value: 'Tidal Flats',
                    label: 'Tidal Flats'
                },
            ],
            shorelineList: [
                {
                    value: 'Residential',
                    label: 'Residential'
                },
                {
                    value: 'Industrial',
                    label: 'Industrial'
                },
                {
                    value: 'Conservation',
                    label: 'Conservation'
                },
                {
                    value: 'Recreational',
                    label: 'Recreational'
                },
                {
                    value: 'Commercial',
                    label: 'Commercial'
                },
                {
                    value: 'Tourism',
                    label: 'Tourism'
                },
            ],
            waveStructureList: [
                {
                    value: 'Breaking Waves',
                    label: 'Breaking Waves'
                },
                {
                    value: 'Non-Breaking Waves',
                    label: 'Non-Breaking Waves'
                },
            ],
            coastalStructureList: [
                {
                    value: 'Seawall',
                    label: 'Seawall'
                },
                {
                    value: 'Revetment',
                    label: 'Revetment'
                },
                {
                    value: 'Bulkheads',
                    label: 'Bulkheads'
                },
                {
                    value: 'Seadike',
                    label: 'Seadike'
                },
                {
                    value: 'Coastal Road',
                    label: 'Coastal Road'
                },
                {
                    value: 'Pile Structure',
                    label: 'Pile Structure'
                },
                {
                    value: 'Port',
                    label: 'Port'
                },
                {
                    value: 'Docks',
                    label: 'Docks'
                },
                {
                    value: 'Wharts',
                    label: 'Wharts'
                },
            ],
            formValidate: {
                province: '',
                municipality: '',
                barangay: '',
                latitude: '',
                longitude: '',
                shoreline: '',
                shorelineValidate: '',
                coastalHazard: '',
                coastalHazardValidate: '',
                morphology: '',
                typeStructure: '',
                typeStructureValidate: '',
                structureMaterial: '',
                structureMaterialValidate: '',
                wavesStructure: '',
                protectionToe: '',
                heightStructure: '',
                lengthStructure: '',
                landwardsTypology: '',
                shorelineTypology: '',
                armorUnits: '',
                nearshoreTypology: '',
                image: '',
                description: '',
            },
            ruleValidate: {
                province: [
                    { required: true, message: 'The province cannot be empty', trigger: 'blur' }
                ],
                municipality: [
                    { required: true, message: 'The municipality cannot be empty', trigger: 'blur' }
                ],
                barangay: [
                    { required: true, message: 'The barangay cannot be empty', trigger: 'blur' }
                ],
                latitude: [
                    { required: true, message: 'The latitude cannot be empty', trigger: 'blur' }
                ],
                longitude: [
                    { required: true, message: 'The longitude cannot be empty', trigger: 'blur' }
                ],
                coastalHazardValidate: [
                    { required: true, message: 'The coastal hazard cannot be empty', trigger: 'blur' }
                ],
                shorelineValidate: [
                    { required: true, message: 'The shoreline cannot be empty', trigger: 'blur' }
                ],
                morphology: [
                    { required: true, message: 'The morphology cannot be empty', trigger: 'blur' }
                ],
                typeStructureValidate: [
                    { required: true, message: 'The Type of Coastal Structure cannot be empty', trigger: 'blur' }
                ],
                structureMaterialValidate: [
                    { required: true, message: 'The structure material cannot be empty', trigger: 'blur' }
                ],
                wavesStructure: [
                    { required: true, message: 'The waves structure cannot be empty', trigger: 'blur' }
                ],
                protectionToe: [
                    { required: true, message: 'The protection toe cannot be empty', trigger: 'blur' }
                ],
                heightStructure: [
                    { required: true, message: 'The height structure cannot be empty', trigger: 'blur' }
                ],
                lengthStructure: [
                    { required: true, message: 'The length structure cannot be empty', trigger: 'blur' }
                ],
                landwardsTypology: [
                    { required: true, message: 'The landwards typology cannot be empty', trigger: 'blur' }
                ],
                shorelineTypology: [
                    { required: true, message: 'The shoreline typology cannot be empty', trigger: 'blur' }
                ],
                nearshoreTypology: [
                    { required: true, message: 'The nearshore typology cannot be empty', trigger: 'blur' }
                ],
                armorUnits: [
                    { required: true, message: 'The armor Units cannot be empty', trigger: 'blur' }
                ],
                image: [
                    { required: true, message: 'The description cannot be empty', trigger: 'blur' }
                ],
                description: [
                    { required: true, message: 'The description cannot be empty', trigger: 'blur' }
                ],
            },
        }
    },
    methods: {
        handleSubmit(name) {
            let existingObj = this;

            if (existingObj.formValidate.structureMaterial.length != 0 || existingObj.formValidate.structureMaterial != "") {
                existingObj.formValidate.structureMaterialValidate = "1"
            } else if (existingObj.formValidate.structureMaterial.length == 0 || existingObj.formValidate.structureMaterial == "") {
                existingObj.formValidate.structureMaterialValidate = ""
            }

            if (existingObj.formValidate.shoreline.length != 0 || existingObj.formValidate.shoreline != "") {
                existingObj.formValidate.shorelineValidate = "1"
            } else if (existingObj.formValidate.shoreline.length == 0 || existingObj.formValidate.shoreline == "") {
                existingObj.formValidate.shorelineValidate = ""
            }

            if (existingObj.formValidate.typeStructure.length != 0 || existingObj.formValidate.typeStructure != "") {
                existingObj.formValidate.typeStructureValidate = "1"
            } else if (existingObj.formValidate.typeStructure.length == 0 || existingObj.formValidate.typeStructure == "") {
                existingObj.formValidate.typeStructureValidate = ""
            }
            if (existingObj.formValidate.coastalHazard.length != 0 || existingObj.formValidate.coastalHazard != "") {
                existingObj.formValidate.coastalHazardValidate = "1"
            } else if (existingObj.formValidate.coastalHazard.length == 0 || existingObj.formValidate.coastalHazard == "") {
                existingObj.formValidate.coastalHazardValidate = ""
            }

            this.$refs[name].validate((valid) => {
                if (valid) {
                    axios.get('/sanctum/csrf-cookie').then(response => {
                        axios.post(`/api/admin/storeInventory`, this.formValidate)
                            .then(function (response) {
                                console.log(response.data);
                                notification.success({
                                    message: 'Notification',
                                    description: 'New Inventory is Successfully Created',
                                });
                                existingObj.$router.push('/admin/inventoryPlatform');
                            })
                            .catch(function (error) {

                            });
                    })
                    console.log(this.formValidate);

                } else {
                }
            })
        },
        provinceChange() {
            let existingObj = this;
            if (existingObj.formValidate.province == 'Ilocos Norte') {
                existingObj.municipalityList = existingObj.ilocosNorteList
            } else if (existingObj.formValidate.province == 'Ilocos Sur') {
                existingObj.municipalityList = existingObj.ilocosSurList
            } else if (existingObj.formValidate.province == 'La Union') {
                existingObj.municipalityList = existingObj.laUnionList
            } else if (existingObj.formValidate.province == 'Pangasinan') {
                existingObj.municipalityList = existingObj.pangasinanList
            }
        },
        handleSuccess(res, file) {
            this.formValidate.image = res
        },
        handleError(res, file) {
            console.log('res', res);
        },
        handleFormatError(file) {
            notification.warning({
                message: 'The file format is incorrect',
                description: 'File format of ' + file.name + ' is incorrect, please select jpg or png.'
            });
        },
        async deleteImage() {
            let image = this.formValidate.image
            this.formValidate.image = ''
            this.$refs.uploads.clearFiles()
            await axios.get('/sanctum/csrf-cookie').then(response => {
                axios.post(`/api/admin/deleteImageInventory`, { imageName: image })
                    .then(function (response) {

                    })
                    .catch(function (error) {
                        if (error) {
                            this.formValidate.image = image
                        }
                    });
            })
        },
    },
    created() {
        this.token = window.Laravel.csrfToken;
    }
})
</script>