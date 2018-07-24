<template>
  <div class="hello">
    <h1>{{ msg }}</h1>
    <div id="my_target"></div>
    <div>
      <input v-model="srcUrl">
      <button @click="loadImage">LOAD</button>
    </div>
    <div><button @click="text_noto">NOTO</button> <button @click="text_mincho">MINCHO</button></div>
    <div><button @click="upload">UPLOAD</button></div>
  </div>
</template>

<script>
  export default {
    name: 'Composite',
    data: function () {
      return {
        msg: 'Welcome to Your Vue.js App',
        srcUrl: null,
        originalImage: null,
        srcImage: null,
        overlayImage: null,
        imgNode: null,
        imgData64: null
      }
    },
    mounted () {
      Jimp.read('./images/example_01.jpg').then(function (lenna) {
        this.originalImage = lenna.clone()
        this.srcImage = lenna
        lenna.resize(700, 468)
          .getBase64(Jimp.MIME_PNG, function (err, src) {
            this.imgNode = document.createElement('img')
            this.imgNode.setAttribute('src', src)
            this.imgData64 = src

            let target = document.getElementById('my_target')
            target.appendChild(this.imgNode)

            err && console.log(err)
          }.bind(this))
      }.bind(this)).catch(function (err) {
        console.error(err)
      })
    },
    methods: {
      loadImage: function () {
        Jimp.read(this.srcUrl).then(function (lenna) {
          this.originalImage = lenna.clone()
          this.srcImage = lenna
          lenna.resize(700, 468)
            .getBase64(Jimp.MIME_PNG, function (err, src) {
              this.imgNode.setAttribute('src', src)
              this.imgData64 = src
              err && console.log(err)
            }.bind(this))
        }.bind(this)).catch(function (err) {
          console.error(err)
        })
      },
      text_noto: function () {
        Jimp.read('./images/notosanscjkjp_black_700x468.png').then(function (text) {
          this.srcImage = this.originalImage.clone()
          this.srcImage.resize(700, 468)
            .composite(text, 0, 0)
            .getBase64(Jimp.MIME_PNG, function (err, src) {
              this.imgNode.setAttribute('src', src)
              this.imgData64 = src
              err && console.log(err)
            }.bind(this))
        }.bind(this)).catch(function (err) {
          console.error(err)
        })
      },
      text_mincho: function () {
        Jimp.read('./images/genkai_mincho_700x468.png').then(function (text) {
          this.srcImage = this.originalImage.clone()
          this.srcImage.resize(700, 468)
            .composite(text, 0, 0)
            .getBase64(Jimp.MIME_PNG, function (err, src) {
              this.imgNode.setAttribute('src', src)
              this.imgData64 = src
              err && console.log(err)
            }.bind(this))
        }.bind(this)).catch(function (err) {
          console.error(err)
        })
      },
      upload: function() {
        let params = new URLSearchParams()
        params.append('img', this.imgData64)
        this.$http.post('/api/file/save', params)
          .then(res =>  {
            console.log('upload completed')
          })
          .catch(error => {
            console.log('error')
          });
      }
    }
  }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  h1, h2 {
    font-weight: normal;
  }
  ul {
    list-style-type: none;
    padding: 0;
  }
  li {
    display: inline-block;
    margin: 0 10px;
  }
  a {
    color: #42b983;
  }
</style>
