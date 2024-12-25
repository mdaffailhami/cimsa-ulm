import { css } from '@emotion/react';
import { Button } from 'react-bootstrap';

export default function PrimaryButton({ aos = 'zoom-in', children }) {
  return (
    <Button
      href='/blog'
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
      css={css`
        &:hover {
          transition: all 0.3s ease-in-out !important;
          transform: scale(1.08) !important;
          background: white !important;
          color: red !important;
        }

        &:not(:hover) {
          transition: transform 0.3s ease-in-out !important;
        }
      `}
    >
      {children}
    </Button>
  );
}
