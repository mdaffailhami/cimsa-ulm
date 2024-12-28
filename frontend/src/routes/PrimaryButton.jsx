import { css } from '@emotion/react';
import { Button } from 'react-bootstrap';
import OnHoverAnimationCss from './OnHoverAnimationCss';
import { Link } from 'react-router';

export default function PrimaryButton({ to, aos = 'zoom-in', children }) {
  return (
    <div data-aos-duration='1200' data-aos={aos} data-aos-once='true'>
      <Button
        as={Link}
        to={to}
        size='lg'
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
    </div>
  );
}
