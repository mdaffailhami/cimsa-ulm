import { css } from '@emotion/react';
import { Container } from 'react-bootstrap';

export default function PageHeader({
  title,
  description,
  titleColor = 'red',
  myCss = '',
}) {
  return (
    <div
      css={css`
        margin-top: 100px;
        margin-bottom: 50px;
        padding: 0 20px;

        @media (min-width: 992px) {
          padding: 0 24%;
        }

        ${myCss}
      `}
    >
      <h1
        data-aos='fade-down'
        data-aos-duration='1200'
        data-aos-once='true'
        css={css`
          text-align: center;
          color: ${titleColor};
          font-weight: bold;

          font-size: 44px;

          @media (min-width: 768px) {
            font-size: 54px;
          }
        `}
      >
        {title}
      </h1>
      <hr
        data-aos='zoom-in'
        data-aos-duration='1200'
        data-aos-once='true'
        css={css`
          margin: 10px auto 20px auto;
          border-width: 2px;
          border-color: black;
          opacity: 1;

          width: 216px;

          @media (min-width: 768px) {
            border-width: 2px;
            width: 270px;
          }
        `}
      />
      <p
        data-aos='zoom-in'
        data-aos-duration='1200'
        data-aos-once='true'
        css={css`
          text-align: center;
          font-size: 17px;

          @media (min-width: 768px) {
            font-size: 18px;
          }
        `}
      >
        {description}
      </p>
    </div>
  );
}
