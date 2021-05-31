<template>
  <lightgallery
    :settings="{ speed: 500, plugins: plugins }"
    :onInit="onInit"
    :onBeforeSlide="onBeforeSlide"
  >
    <a
      v-for="item in items"
      :key="item.id"
      :data-lg-size="item.size"
      className="gallery-item"
      :data-src="addPatchToImg('slider', item.src)"
    >
      <img className="img-responsive" :src="addPatchToImg('thumbnail', item.src)" />
    </a>
  </lightgallery>
</template>

<script>
import Lightgallery from 'lightgallery/vue';
import lgZoom from 'lightgallery/plugins/zoom';
let lightGallery = null;
export default {
  name: 'App',
  components: {
    Lightgallery,
  },
  watch: {
    items(newVal, oldVal) {
      this.$nextTick(() => {
        lightGallery.refresh();
      });
    },
  },
  data: () => ({
    plugins: [lgZoom],
    baseURL: 'http://meteo.wachcio.pl/assets/slider/',
    items: [
      {
        id: '1',
        size: '1565-1024',
        src: 'meteo01.png',
      },
      {
        id: '2',
        size: '1565-1024',
        src: 'meteo02.png',
      },
      {
        id: '3',
        size: '1565-1024',
        src: 'meteo03.png',
      },
      {
        id: '4',
        size: '1565-1024',
        src: 'meteo04.png',
      },
      {
        id: '5',
        size: '1620-1080',
        src: 'IMG_5905.JPG',
      },
      {
        id: '6',
        size: '1080-1620',
        src: 'IMG_5925.JPG',
      },
      {
        id: '7',
        size: '1920-1044',
        src: 'IMG_20180408_140523773.jpg',
      },
      {
        id: '8',
        size: '1920-1044',
        src: 'IMG_20180407_161515269.jpg',
      },
      {
        id: '9',
        size: '1920-1044',
        src: 'IMG_20180407_161528834.jpg',
      },
      {
        id: '10',
        size: '1080-1440',
        src: 'IMG_20180408_112302544.jpg',
      },
    ],
  }),
  methods: {
    onInit: detail => {
      lightGallery = detail.instance;
    },
    onBeforeSlide: () => {
      console.log('calling before slide');
    },
    addPatchToImg(patchType, img) {
      let patch = '';
      if (patchType === 'slider') {
        patch = `${this.baseURL}${img}`;
      }
      if (patchType === 'thumbnail') {
        patch = `${this.baseURL}thumbnails/${img}`;
      }

      return patch;
    },
  },
};
</script>
<style lang="css">
@import url('https://cdn.jsdelivr.net/npm/lightgallery@2.1.0-beta.1/css/lightgallery.css');
@import url('https://cdn.jsdelivr.net/npm/lightgallery@2.1.0-beta.1/css/lg-zoom.css');
body {
  margin: 0;
}
.gallery-item {
  margin: 5px;
}
</style>
