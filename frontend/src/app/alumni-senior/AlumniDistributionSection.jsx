import { css } from '@emotion/react';

export default function AlumniDistributionSection({ image }) {
  return (
    <div
      data-aos='zoom-out-up'
      data-aos-duration='1200'
      data-aos-once='true'
      css={css`
        border: 8px solid red;

        @media (min-width: 768px) {
          border: 15px solid red;
        }
      `}
    >
      <div
        css={css`
          display: flex;
          justify-content: center;
          align-items: center;
          height: 100px;
          background-color: red;
          color: white;
        `}
      >
        <h1
          data-aos='zoom-out'
          data-aos-duration='1200'
          data-aos-once='true'
          css={css`
            font-weight: bold;
            /* font-size: 36px; */
            text-align: center;
          `}
        >
          Distribution of Our Alumni
        </h1>
      </div>
      <img
        src={image}
        // src={
        //   'https://cdn.britannica.com/37/245037-050-79129D52/world-map-continents-oceans.jpg'
        // }
        style={{
          width: '100vw',
          height: 'auto',
          objectFit: 'cover',
        }}
      />
    </div>
  );
}
