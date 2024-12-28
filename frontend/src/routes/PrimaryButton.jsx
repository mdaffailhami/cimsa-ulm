import { css } from '@emotion/react';
import { Button } from 'react-bootstrap';
import OnHoverAnimationCss from './OnHoverAnimationCss';

export default function PrimaryButton({ href, aos = 'zoom-in', children }) {
  return (
    <Button
      href={href}
      size='lg'
      data-aos-duration='1200'
      data-aos={aos}
      data-aos-once='true'
      style={{
        backgroundColor: 'red',
        borderColor: 'red',
        color: 'white',
        display: 'inline-block',
      }}
      css={OnHoverAnimationCss(
        1.08,
        css`
          background: white !important;
          color: red !important;
        `
      )}
    >
      {children}
    </Button>
  );
}
