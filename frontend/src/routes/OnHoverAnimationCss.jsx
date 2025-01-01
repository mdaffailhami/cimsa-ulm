import { css } from '@emotion/react';

export default function OnHoverAnimationCss(
  scale,
  onHover = '',
  onUnHover = ''
) {
  return css`
    &:hover {
      transition: all 0.3s ease-in-out !important;
      transform: scale(${scale}) !important;
      ${onHover}
    }

    &:not(:hover) {
      transition: transform 0.3s ease-in-out !important;
      /* transform: scale(1) !important; */
      ${onUnHover}
    }
  `;
}
