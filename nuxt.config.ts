// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  app: {
    head: {
      title: 'Wardrobe Management',
      meta: [
        { charset: 'utf-8' },
        { name: 'viewport' , content: 'width=device-width, initial-scale=1' },
        { hid: 'description', name: 'description' , content: 'Wardrobe Management meta desc' }

      ],
      link: [
        {
          rel: 'stylesheet',
          type: 'text/css',
          href: 'https://fonts.googleapis.com/css2?family=Roboto&display=swap'
        },
        {
          rel: 'image',
          type: 'image/x-icon',
          href: '/favicon.ico'
        },
        {
          rel: 'stylesheet',
          type: 'text/css',
          href: 'http://127.0.0.1:3000/assets/css/bootstrap.min.css',
        },
      ],
      script: [
        {
          type: 'text/javascript',
          src: 'http://127.0.0.1:3000/assets/js/jquery/3.7.1/jquery.min.js'
        },
        {
          type: 'text/javascript',
          src: 'http://127.0.0.1:3000/assets/js/bootstrap.bundle.min.js'
        }
      ]
    }
  },
  ssr: false,
  compatibilityDate: '2025-02-01',
  plugins: ['~/plugins/axios.js'],
  devtools: { enabled: true }
})
