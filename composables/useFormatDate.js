export function useFormatDate(dateString) {
    const date = new Date(dateString);
  const hours = date.getHours();
  const minutes = date.getMinutes();
  const timeString = `${(hours % 12) || 12}:${minutes.toString().padStart(2, '0')} ${(hours >= 12) ? 'PM' : 'AM'}`;

  const tomorrow = new Date();
  tomorrow.setDate(tomorrow.getDate() + 1);

  const yearString = (new Date().getFullYear() !== date.getFullYear() || date.getDate() === tomorrow.getDate())
    ? ` ${date.toLocaleDateString('en-US', { month: 'short', day: 'numeric' })}`
    : '';

  return `${timeString}${yearString}`;
}