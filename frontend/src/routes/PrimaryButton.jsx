import { css } from '@emotion/react';
import { Button } from 'react-bootstrap';
import OnHoverAnimationCss from './OnHoverAnimationCss';
import { Link } from 'react-router';

export default function PrimaryButton({
  to,
  target = undefined,
  aos = 'zoom-in',
  color = 'red',
  isLarge = true,
  children,
}) {
  return (
    <div data-aos-duration='1200' data-aos={aos} data-aos-once='true'>
      <Button
        as={Link}
        to={to}
        target={target}
        size={isLarge ? 'lg' : 'md'}
        style={{
          backgroundColor: color,
          borderColor: color,
          color: 'white',
          display: 'inline-block',
        }}
        css={OnHoverAnimationCss(
          1.08,
          css`
            background: white !important;
            color: ${color} !important;
          `
        )}
      >
        {children}
      </Button>
    </div>
  );
}
