export const useDownloadImage = async(url) => {
    try {
    const response = await fetch(url);
    const blob = await response.blob();
    return blob;
  } catch (error) {
    console.error('Error downloading image:', error);
    return null;
  }
}