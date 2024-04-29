<script setup>
const iframeUrl = 'https://app.chatbit.co/iframe/57b8aae5-880d-4019-a595-e6d992636791';
const chatFrame = ref(null);

const updateIframeStyles = () => {
    const iframeDocument = chatFrame.value.contentDocument || chatFrame.value.contentWindow.document;

    const styleElement = iframeDocument.createElement('style');
    styleElement.textContent = `
    body {
      background-color: #000;
      font-family: Arial, sans-serif;
    }
    h1 {
      color: blue;
    }
  `;

    iframeDocument.head.appendChild(styleElement);
};
</script>

<template>
    <section class="bg-slate-100">
        <div class="container py-32 mx-auto">
            <div class="rounded-xl max-w-4xl mx-auto relative max-h-[calc(720px-40px)] overflow-hidden shadow-2xl">
                <div class="absolute top-0 left-0 w-full bg-white h-20">
                    <div class="px-4 py-4">
                        <div class="flex items-center gap-x-4">
                            <span class="bg-slate-200 h-12 w-12 rounded-full"></span>
                            <span class="font-semibold">Sajiloobus Bot</span>
                        </div>
                    </div>
                </div>
                <iframe ref="chatFrame" width="100%" style="height: 100%; min-height: 720px" frameborder="0"
                    :src="iframeUrl"></iframe>
            </div>
        </div>
    </section>
</template>
