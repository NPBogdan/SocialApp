import axios from "axios";
export default {
    data() {
        return {
            form: {
                body: '',
                media: []
            },
            media: {
                images: [],
                videos: null,
                progress: 0
            },
            mediaTypes: {}
        }
    },
    methods: {
        async submit() {
            if (this.media.images.length > 0 || this.media.videos) {
                let mediaResult = await this.uploadMedia()
                //Adaugam toate id-urile fisierelor in corpul formularului
                this.form.media = mediaResult.data.data.map(function (item) {
                    return item.id
                })
            }
            await this.post()

            this.form.body = ''
            this.form.media = []
            this.media.videos = null
            this.media.images = []
            this.media.progress = 0
        },

        async uploadMedia() {
            return await axios.post('/api/media', this.buildMediaForm(), {
                headers: {
                    'Content-Type': 'multipart/form-data'
                },
                onUploadProgress: this.administreazaProgresulUpload
            })
        },

        administreazaProgresulUpload(event) {
            this.media.progress = parseInt(Math.round((event.loaded / event.total) * 100)) //Calculam procentajul ramas pana la urcarea continutului
        },

        //Functie pentru a crea formularul media pe care i-l urcam
        buildMediaForm() {
            let form = new FormData()

            if (this.media.images.length) {
                this.media.images.forEach((image, index) => {
                    form.append(`media[${index}]`, image)
                })
            }

            if (this.media.videos) {
                form.append('media[0]', this.media.videos)
            }

            return form
        },

        manageMediaSelected(files) {
            Array.from(files).slice(0, 4).forEach((file) => {
                if (this.mediaTypes.image.includes(file.type)) {
                    this.media.images.push(file)
                }

                if (this.mediaTypes.video.includes(file.type)) {
                    this.media.videos = file
                }

                /*Daca sunt urcate imagini impreuna cu videoclipuri atunci vom sterge imaginile
                deoarece noi putem sa urcam doar unul dintre cele doua tipuri de media */
                if (this.media.videos) {
                    this.media.images = []
                }
            })
        },

        //Luam tipurile de media pe care le putem urca
        async getMediaTypes() {
            let response = await axios.get('/api/media/types')

            this.mediaTypes = response.data.data
        },
        removeVideo() {
            this.media.videos = null
        },
        removeImage(image) {
            this.media.images = this.media.images.filter((imageItem) => {
                return image !== imageItem
            })
        }
    },
    mounted() {
        this.getMediaTypes()
    }
}
